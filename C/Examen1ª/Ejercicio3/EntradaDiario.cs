class EntradaDiario
{
    private DateTime Fecha;
    private string Titulo;
    private string Contenido;

    public EntradaDiario(DateTime fecha, string titulo, string contenido)
    {
        Fecha = fecha;
        Titulo = titulo;
        Contenido = contenido;
    }

    public DateTime GetFecha()
    {
        return Fecha;
    }
    public string GetTitulo()
    {
        return Titulo;
    }
    public string GetContenido()
    {
        return Contenido;
    }

    public void FormatearEntrada()
    {
        Console.WriteLine($"            Título: {Titulo}");
        Console.WriteLine($"        Contenido: {Contenido}");
        Console.WriteLine($"    Fecha: {Fecha.ToShortDateString()}");
        Console.WriteLine($"**********************************************");
    }
}