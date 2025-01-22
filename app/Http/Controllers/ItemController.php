<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Availability;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ItemRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    protected $categoryRepository, $itemRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, ItemRepositoryInterface $itemRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->itemRepository = $itemRepository;
    }

    public function index() {
        $data['title'] = 'Master Item';
        $data['category'] = $this->categoryRepository->getAllCategory();
        return view('master-item/index', $data);
    }

    public function add() { 
        $data['title'] = 'Add Master Item';
        return view('master-item/add-master-item', $data);
    }

    //category
    public function getCategory() {
        $category = $this->categoryRepository->getAllCategory();
        return response()->json([
            'category' => $category
        ], 200);   
    }

    public function storeCategory(Request $request) {
        $data = $request->only(['nama_category']);
        $category = $this->categoryRepository->createCategory($data);
        return response()->json([
            'message' => 'Category created successfully!',
            'category' => $category,
        ], 201);
    }

    //master item
    public function getMasterItem() {
        $item = $this->itemRepository->getAllItem();
        
        return response()->json([
            'item' => $item
        ], 200);
    }

    public function getItemByCategory($id_cat) {
       $item = $this->itemRepository->getByCat($id_cat);

       return response()->json([
        'item' => $item
        ], 200);
    }

    public function get_code($prefix) {
        $newCode = Item::generateCode($prefix);
    
        return response()->json(['message' => 'Item created successfully', 'code' => $newCode]);
    }
    
    public function storeItem(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_item' => 'required',
            'seri' => 'required',
            'merk' => 'required',
            'harga_per_hari' => 'required|numeric',
            'category_id' => 'required',
            'stok' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->itemRepository->createItem($request->all());

        return redirect()->route('index.item')
            ->with('success', 'Item created successfully.');
    }

    public function updateItem(Request $request, $id) {
        $item = Item::find($id);
        $item->update([
            'stok' => $request->stok,
            'merk' => $request->merk,
            'seri' => $request->seri, 
            'nama_item' => $request->nama_item,
            'spesifikasi' => $request->spek,
            'harga_per_hari' => $request->harga
        ]);
        return response()->json(['message' => 'Item update successfully.'], 201);
    }

    public function getItemById($id) {
        $item = $this->itemRepository->getById($id);
        if($item) {
        $data['title'] = $item->nama_item;
        $data['item'] = $item;
        return view('master-item/view-master-item', $data);
        } else {
            abort(404);
        }
    }

    public function update_status_item($id) {
        $item = Item::find($id);
        $status = $item->status;
        if($status == false){
            $status = true;
        } else {
            $status = false;
        }
        $item->update([
            'status' => $status
        ]);
        return response()->json(['message' => 'Item status changed successfully'], 201);
    }

    public function get_last_available($id) {
        $item = Availability::find($id);
        return response()->json([
            'item' => $item
        ]);
    }
}
