<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\view;
use App\Models\MenuItem;


class MenuItemController extends Controller
    {
        // Display a listing of the menu items
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('menu_items.index', compact('menu_items'));
    }

    // Show the form for creating a new menu item
    public function create()
    {
        return view('menu_items.create');
    }

    // Store a newly created menu item in storage
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        MenuItem::create([
            'name'  => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('menu_items.index')->with('success', 'Menu item created successfully.');
    }

    // Show the form for editing the specified menu item
    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return view('menu_items.edit', compact('menuItem'));
    }

    // Update the specified menu item in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update([
            'name'  => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('menu_items.index')->with('success', 'Menu item updated successfully.');
    }

    // Remove the specified menu item from storage
    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect()->route('menu_items.index')->with('success', 'Menu item deleted successfully.');
    }
}
?>
    
