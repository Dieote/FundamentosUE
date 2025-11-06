class Coche : Vehiculo
{
    private string? color;
    
    public Coche() { }
    public Coche(string marca, string modelo, int anio, string color) : base(marca, modelo, anio){
        this.color = color;
    }

    public String? getColor(){
        return color;
    }
    public override void MostrarDatos(){
        Console.WriteLine("Marca: " + getMarca());
        Console.WriteLine("Modelo: " + getModelo());
        Console.WriteLine("Año: " + getAnio());
        Console.WriteLine("Color: " + getColor());
    }
}
