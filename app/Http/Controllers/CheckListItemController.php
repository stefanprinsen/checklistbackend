<?php

namespace App\Http\Controllers;

use App\CheckListItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckListItemController extends Controller
{   
    public function index() 
    {
        return response()->json(CheckListItem::all())->header('Access-Control-Allow-Origin', '*');
    }
    
    public function getCheckListItem($id) 
    {
        return response()->json(CheckListItem::find($id))->header('Access-Control-Allow-Origin', '*');   
    }
    
    public function saveCheckListItem(Request $request)
    {
        $checkListItem = CheckListItem::create([
          'title' => $request->json()->get('title'),
          'task' => $request->json()->get('task')
        ]);
      
        return response()->json($checkListItem)->header('Access-Control-Allow-Origin', '*');
    }
    
    public function updateCheckListItem(Request $request, $id)
    {
        $checkListItem = CheckListItem::find($id);
        
        $checkListItem->title = $request->json()->get('title');
        $checkListItem->task = $request->json()->get('task');
        $checkListItem->finished = $request->json()->get('finished');
        
        $checkListItem->save();
        
        return response()->json($checkListItem)->header('Access-Control-Allow-Origin', '*');
    }
    
    public function deleteCheckListItem($id)
    {
        $checkCheckListItem = CheckListItem::find($id);
        $checkCheckListItem->delete();
        return response()->json('success')->header('Access-Control-Allow-Origin', '*');
    }
}
