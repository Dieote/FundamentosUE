class Producto
{
    public string Nombre;
    public double Precio;
    public int Cantidad;

    public Producto(string nombre, double precio, int cantidad)
    {
        Nombre = nombre;
        Precio = precio;
        Cantidad = cantidad;
    }

    public string? getNombre(){
        return Nombre;
    }

    public double getPrecio(){
        return Precio;
    }
    
    public int getCantidad(){
        return Cantidad;
    }
    public void MostrarDatos()
    {
        Console.WriteLine("Productos en folleto: ");
        Console.WriteLine("nNombre: " + Nombre + " | €€ " + Precio + " | Stock " + Cantidad);

    }
    
    
}