class Program
{
    static void Main(string[] args)
    {
        List<int> temperaturasAleatorias = new List<int>();

        for (int i = 0; i < 5; i++)
        {
            int numTemperatura = new Random().Next(5, 31);
            temperaturasAleatorias.Add(numTemperatura);
            Console.WriteLine("Temperaturas generadas: " + numTemperatura);
        }
        Console.WriteLine("Temperaturas generadas correctamente.");

        int tempAlta = temperaturasAleatorias[0];
        int tempBaja = temperaturasAleatorias[0];
        int tempMedia = temperaturasAleatorias[0];

        foreach (var item in temperaturasAleatorias)
        {
            if (item > tempAlta)
            {
                tempAlta = item;
            }
            if (item < tempBaja)
            {
                tempBaja = item;
            }

            tempMedia += item;
        }
        int sumaMedia = tempMedia / temperaturasAleatorias.Count;

        Console.WriteLine("Temperatura mas alta: " + tempAlta);
        Console.WriteLine("Temperatura mas baja: " + tempBaja);
        Console.WriteLine("Temperatura media: " + sumaMedia);

    }
    
}