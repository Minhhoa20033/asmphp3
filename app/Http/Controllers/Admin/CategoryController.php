<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    const PATH = 'admin.categorys.';
    public function index()
    {
        try {
            //Lấy tất cả categories
            $categoriess = Category::query()->latest('id')->paginate(10);


            return view(self::PATH . __FUNCTION__, compact('categoriess'));
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Lỗi hệ thống
            abort(500);
        }
    }

    public function show(Category $category)
    {
        try {
            return view(self::PATH . __FUNCTION__, compact('category'));
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Chuyển về trang chủ với thông báo khi có lỗi
            return redirect()->route('categories.index')->with('success', 'Lỗi hệ thống');
        }
    }

    public function destroy(Category $category)
    {
        try {
            //Xóa danh mục
            $category->delete();

            return redirect()->route('categories.index')->with('success', true);
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Chuyển về trang chủ với thông báo khi có lỗi
            return redirect()->route('categories.index')->with('success', 'Xóa không thành công');

            // //Kiểu tra tài nguyên tồn tại không
            // abort_if(empty($Category), 404);

            // //Lỗi hệ thống
            // abort(500);
        }
    }

    public function create()
    {
        return view(self::PATH . __FUNCTION__);
    }

    public function store(Request $request)
    {
        //Kiểm tra validate
        $data = $request->validate([
            'name'  => 'required|string|max:10|unique:categories',
        ]);

        try {
            //Thêm mới danh mục
            Category::query()->create($data);

            //Chuyển về trang chủ nếu thành công
            return redirect()->route('categories.index')->with('success', true);
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Chuyển về trang chủ với thông báo khi có lỗi
            return back()->with('success', 'Lỗi hệ thống');
        }
    }

    public function edit(Category $category)
    {
        return view(self::PATH . __FUNCTION__, compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        //Kiểm tra validate
        $data = $request->validate([
            'name' => ['required', 'string', 'max:10', Rule::unique('categories')->ignore($category)],
        ]);

        try {
            //Thêm mới sản phẩm
            $category->update($data);

            //Chuyển về trang chủ nếu thành công
            return redirect()->route('categories.edit', $category)->with('success', true);
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Chuyển về trang chủ với thông báo khi có lỗi
            return back()->with('success', 'Lỗi hệ thống');
        }
    }

    public function products(Category $category)
    {
        try {
            //lấy tất cả sản phẩm thuộc danh mục này (mối quan hệ)
            $products = $category->load('products')->products()->paginate(10);

            return view(self::PATH . __FUNCTION__, compact('category', 'products'));
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Lỗi hệ thống
            abort(500);
        }
    }
}

