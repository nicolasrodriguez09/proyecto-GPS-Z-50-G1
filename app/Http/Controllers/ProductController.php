use App\Models\Product;
use Illuminate\Http\Request;

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'deposit' => 'nullable|numeric',
        'image' => 'nullable|image',
        'location' => 'required',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'deposit' => $request->deposit,
        'image' => $imagePath,
        'location' => $request->location,
        'available' => true,
        'user_id' => auth()->id(),
    ]);

    return redirect()->back()->with('success', 'Producto publicado');
}
