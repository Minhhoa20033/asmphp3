<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ao;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use function Psy\debug;

class ProductController extends Controller
{
    const PATH = 'admin.products.';
    public function index()
    {
        try {
            //Lấy tất cả categories
            $products = Ao::query()
            ->join('categories', 'aos.category_id', '=', 'categories.id')
            ->select('aos.*', 'name')
            ->orderByDesc('id')
            ->paginate(10);
            


            return view(self::PATH . __FUNCTION__, compact('products',));     
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            // Dd($th->getMessage());

            //Lỗi hệ thống
            abort(500);
        }
    }

    public function show($id)
    {
        try {
           $ao = Ao::query()
            ->join('categories', 'aos.category_id', '=', 'categories.id')
            ->select('aos.*', 'name')
            ->findOrFail($id);

            return view(self::PATH . __FUNCTION__, compact('ao'));
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);
            

            //Chuyển về trang chủ với thông báo khi có lỗi
            return redirect()->route('aos.index')->with('success', 'Lỗi hệ thống');
        }
    }

    public function destroy($id)
    {
        try {
            //Xóa danh mục
            DB::table('aos')->where('id', $id)->delete();

            return redirect()->route('aos.index')->with('success', true);
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Chuyển về trang chủ với thông báo khi có lỗi
            return redirect()->route('aos.index')->with('success', 'Xóa không thành công');

            // //Kiểu tra tài nguyên tồn tại không
            // abort_if(empty($ao), 404);

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
        $data = $request->except('image');

        try {


            //Thêm mới danh mục
            $path = '';
            if($request->hasFile('image')){
                $path = $request->file('image')->store('images');
            }
            $data['image'] = $path;
            
            Ao::query()->create($data);
            // dd($data);

            //Chuyển về trang chủ nếu thành công
            return redirect()->route('aos.index')->with('success', true);
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);
            dd($th->getMessage());
            //Chuyển về trang chủ với thông báo khi có lỗi
            return back()->with('success', 'Lỗi hệ thống');
        }
    }

    public function edit($id)
    {

         $ao = Ao::query()
            ->join('categories', 'aos.category_id', '=', 'categories.id')
            ->select('aos.*', 'name')
            ->findOrFail($id);
        return view(self::PATH . __FUNCTION__, compact('ao'));
    }

    public function update(Ao $ao, Request $request)
    {
        //Kiểm tra validate
        // $data = $request->except('image');
        try {
            $data = $request->validate([
                'title' => ['required', 'min:3'],
                'image' => ['mimes:jpeg,png,jpg,gif', 'max:2048'],
                'price' => ['required', 'min:5'],
                'quantity' => ['required', 'min:1'],
                'description' => ['required', 'min:3'],
                'category_id' => ['required'],
                     // Thêm trạng thái kích hoạt
            ]);

            $data = $request->except('image');
            debug($data);
            $avatar_old = $ao->avatar;
            $data['image'] = $avatar_old;
            // Kiểm tra xem có file hình ảnh không
            if ($request->hasFile('image')) {
                // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
                $files_avatars = $request->file('image')->store('images');
                $data['image'] = $files_avatars;
                // $data['image'] = $request->file('image')->store('products', 'public');
            }
            $ao->update($data);
            
           
        //     $avatar_old = $ao->image;
        //     $data['image'] = $avatar_old;
        //      if ($request->hasFile('image')) {
        //         $path = $request->file('image')->store('images');
        //         $data['image'] = $path;
        //     }
        //      DB::table('aos')->where('id', $ao->id)->update($data);
        //     //Chuyển về trang chủ nếu thành công
            
            return redirect()->route('aos.edit', $ao)->with('success', true);
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);
          
            //Chuyển về trang chủ với thông báo khi có lỗi
            return back()->with('success', 'Lỗi hệ thống');
        }
    }

    public function products(ao $ao)
    {
        try {
            //lấy tất cả sản phẩm thuộc danh mục này (mối quan hệ)
            $products = $ao->load('products')->products()->paginate(10);

            return view(self::PATH . __FUNCTION__, compact('ao', 'products'));
        } catch (\Throwable $th) {
            //Log lỗi
            Log::error(__CLASS__ . '@' . __FUNCTION__, ['errors' => $th->getMessage()]);

            //Lỗi hệ thống
            abort(500);
        }
    }
}
