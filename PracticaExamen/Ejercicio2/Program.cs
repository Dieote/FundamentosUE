class Program{

    static void Main(string[] args)
    {

        Tienda tiendaMadrid = new Tienda();

        tiendaMadrid.AgregrProducto(new Producto("Mesa", 14.3, 5));
        tiendaMadrid.AgregrProducto(new Producto("Silla", 7.3, 5));
        tiendaMadrid.AgregrProducto(new Producto("Lampara", 24.3, 5));

        Console.WriteLine("Listado de precios y productos.");
        tiendaMadrid.listarProducto();

        Console.WriteLine("El precio total de los productos es: " + tiendaMadrid.CalcularPrecioTotal());

    }
}