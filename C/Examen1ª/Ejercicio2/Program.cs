class Program
{
    static void Main(string[] args)
    {

        Empleado empleado1 = new Empleado("Juan", 30, 50000);
        Empleado empleado2 = new Empleado("Maria", 25, 55000);
        Empleado empleado3 = new Empleado("Pedro", 40, 80000);
        empleado1.MostrarInformacion();

        Programador programador1 = new Programador("Ana", 28, 60000, "C#");
        Programador programador2 = new Programador("Carlos", 32, 65000, "Python");
        Programador programador3 = new Programador("Elena", 29, 72000, "JavaScript");
        programador1.MostrarInformacion();
    
        List<Empleado> empleadosList = new List<Empleado>();
        empleadosList.Add(empleado1);
        empleadosList.Add(empleado2);
        empleadosList.Add(empleado3);
        empleadosList.Add(programador1);
        empleadosList.Add(programador2);
        empleadosList.Add(programador3);


        foreach (var item in empleadosList)
        {
            item.MostrarInformacion();
        }

    }
    
}