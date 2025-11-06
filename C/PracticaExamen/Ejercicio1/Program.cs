class Program {

    static void Main(string[] args)
    {
        Console.WriteLine("Calificaciones del Alumno: ");
        List<Alumno> ListaAlumnos = new List<Alumno>();

        FileStream fileStream = null;
        StreamReader streamReader = null;

        try
        {
            fileStream = new FileStream(@"\Users\Usuario\Documents\GitHub\FundamentosUE\PracticaExamen\Ejercicio1\Alumnos.txt", FileMode.Open);
            streamReader = new StreamReader(fileStream);

            String? linea = null;
            while ((linea = streamReader.ReadLine()) != null)
            {

                string[] palabras = linea.Split(", ");
                Alumno alumno1 = new Alumno(palabras[0], int.Parse(palabras[1]), palabras[2]);
                ListaAlumnos.Add(alumno1);
            }

            Console.WriteLine("El numero de alumnos " + ListaAlumnos.Count);
            foreach (var item in ListaAlumnos) {
                item.MostrarDatos();
            }
        }
        catch (System.Exception ex) {
            Console.WriteLine("Error de lectura.");
        }
    finally{
            fileStream?.Close();
            streamReader?.Close();
        }
    }
}