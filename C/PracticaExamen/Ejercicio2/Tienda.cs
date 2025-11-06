class Tienda{

    public Tienda(){
        listaProducto = new List<Producto>();
    }
    private List<Producto> listaProducto;

    public void AgregrProducto(Producto producto){
        listaProducto.Add(producto);
    }

    public void BuscarProducto(String nombre){
        foreach (var item in listaProducto){
            if (item.getNombre() == nombre){
                item.MostrarDatos();
            }
        }
    }

    public void listarProducto(){
        foreach (var item in listaProducto)
        {
            item.MostrarDatos();
        }
    }

    public double CalcularPrecioTotal()
    {
        double total = 0;
        foreach (var item in listaProducto)
        {
            total += item.getCantidad() * item.getPrecio();
        }
        return total;
    }
}