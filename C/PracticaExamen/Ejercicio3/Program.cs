class Program
{
    static void Main()
    {
        List<int> numAleatorios = new List<int>();

        for (int i = 0; i < 20; i++)
        {
            int numerosAleatorios = new Random().Next(1, 101);
            numAleatorios.Add(numerosAleatorios);
            Console.WriteLine("Numero generado: " + numerosAleatorios);
        }
        int esPar = 0;
        int esImpar = 0;
        int mayor = numAleatorios[0];
        int menor = numAleatorios[0];
        int suma = 0;

        foreach (int item in numAleatorios)
        {
            if (item % 2 == 0)
            {
                esPar++;
            }
            else
            {
                esImpar++;
            }

            if (item > mayor)
            {
                mayor = item;
            }
            if (item < menor)
            {
                menor = item;
            }
            suma += item;
        }

        Console.WriteLine("Numeros pares: " + esPar);
        Console.WriteLine("Numeros impares: " + esImpar);
        Console.WriteLine("Numeros mayores: " + mayor);
        Console.WriteLine("Numeros menores: " + menor);
        Console.WriteLine("Suma de numeros: " + suma);
    }
}