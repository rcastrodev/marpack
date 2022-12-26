<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription($page->keywords);

        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section1s  = $section1->contents()->orderBy('order', 'ASC')->get();
        $categories = Category::all();
        $products = Product::where('outstanding', 1)->orderBy('order', 'DESC')->take(4)->get();
        return view('paginas.index', compact('section1s', 'categories', 'products'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('Empresa');
        SEO::setDescription($page->keywords);
        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first(); // section2 == sección de ribbon

        $sliders    =  $section1->contents()->orderBy('order', 'ASC')->get();
        $company    =  $section2->contents()->first();

        return view('paginas.empresa', compact('sliders', 'company'));
    }

    public function productos(Request $request)
    {
        if(! $request->get('b')){
            $categories = Category::orderBy('order', 'ASC')->get();
            $products = null;
        }else{
            $products = Product::where('name', 'like', "%{$request->get('b')}%")->orderBy('order', 'ASC')->get(); 
            $categories = null;
        }
            
        if ($categories or $products) {
            $page = Page::where('name', 'productos')->first();
            SEO::setTitle("Productos");
            SEO::setDescription($page->keywords);     
        }
        
        return view('paginas.productos', compact('categories', 'products'));
    }
    
    public function categoria($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        $categories = Category::all();
        
        return view('paginas.productos-por-categoria', compact('category', 'categories', 'products'));
    }

    public function producto(Request $request, Product $product)
    {
        $categories = Category::all();
        if ($product) {
            SEO::setTitle($product->name);
            SEO::setDescription($product->keywords);
        }
        $relatedProducts = $product->category->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        if(count($relatedProducts) > 2)
            $relatedProducts = $relatedProducts->take(3);
        
        $vps = session('vps');
        
        return view('paginas.producto', compact('product', 'categories', 'relatedProducts', 'vps'));
    }

    public function cotizacion()
    {
        $page = Page::where('name', 'cotizacion')->first();
        SEO::setTitle("cotización");
        SEO::setDescription($page->keywords);
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto");
        SEO::setDescription($page->keywords);       
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->extra);  
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->extra))
            Storage::disk('public')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }
}
