/* 
Diseña un programa en C# que permita registrar y analizar las temperaturas diarias 
durante una semana. El programa debe:
• Usar un array de 7 elementos (uno por cada día de la semana) para 
almacenar las temperaturas (números enteros).
• Solicitar al usuario que introduzca la temperatura de cada día.
• Mostrar un menú sencillo con las siguientes opciones:
o Ver la temperatura media de la semana.
o Mostrar el día más caluroso.
o Mostrar el día más frío.
o Salir del programa.
*/

class Program
{
    static void Main(string[] args)
    {
        Console.WriteLine("Bienvenido al programa de análisis de temperaturas semanales.");
        List<int> temperaturas = new List<int>(7);
        for (int i = 0; i < 7; i++)
        {
            int temperatura = 0;
            Console.Write($"Introduce la temperatura del día {i + 1}: ");
             temperatura = int.Parse(Console.ReadLine());
            temperaturas.Add(temperatura);
        }
        int opcion = 0;
        do
        {
            Console.WriteLine("\nMenú de opciones:");
            Console.WriteLine("1. Ver la temperatura media de la semana.");
            Console.WriteLine("2. Mostrar el día más caluroso.");
            Console.WriteLine("3. Mostrar el día más frío.");
            Console.WriteLine("4. Salir del programa.");
            Console.Write("Selecciona una opción (1-4): ");
            opcion = int.Parse(Console.ReadLine());
            switch (opcion)
            {
                case 1:
                    double media = 0;
                    foreach (int temp in temperaturas)
                    {
                        media += temp;
                    }
                    media /= temperaturas.Count;
                    Console.WriteLine($"La temperatura media de la semana es: {media}");
                    break;
                case 2:
                    int maxTemp = temperaturas.Max();
                    Console.WriteLine($"El día más caluroso tuvo una temperatura de: {maxTemp}");
                    break;
                case 3:
                    int minTemp = temperaturas.Min();
                    Console.WriteLine($"El día más frío tuvo una temperatura de: {minTemp}");
                    break;
                case 4:
                    Console.WriteLine("Saliendo del programa...");
                    break;
                default:
                    Console.WriteLine("Opción no válida. Por favor, selecciona entre 1 y 4.");
                    break;
                    }
        } while (opcion != 4);
    }
}