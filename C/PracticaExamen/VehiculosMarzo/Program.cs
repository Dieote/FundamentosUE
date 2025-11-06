class Program
{
    static void Main(string[] args)
    {
        Coche miCoche = new Coche("Toyota", "Corolla", 2020, "Azul");
        Coche miCoche1 = new Coche("Porsche", "Taigo", 2024, "Rojo");
        Moto miMoto = new Moto("Honda", "CBR", 2019, true);
        Moto miMoto1 = new Moto("Yamaha", "RZT", 2021, true);

        List<Vehiculo> vehiculos = new List<Vehiculo>();
        vehiculos.Add(miCoche);
        vehiculos.Add(miCoche1);
        vehiculos.Add(miMoto);
        vehiculos.Add(miMoto1);

            Console.WriteLine("Vehiculos:");
        foreach (Vehiculo vehiculo in vehiculos)
        {
            vehiculo.MostrarDatos();
        }
    }
}