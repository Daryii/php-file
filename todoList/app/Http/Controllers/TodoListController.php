<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function saveItem(Request $request) {

        Log::info(json_encode($request->all()));

        $request->validate([
            "ListItem" => "required|string|max:255",
        ]);

        Log::info('ListItem: ' . $request->input("ListItem"));
        $newListItem = new ListItem;
        $newListItem->name = $request->input("ListItem");
        $newListItem->is_complete = 0;
        $newListItem->save();

        return view("welcome");
    }

}

