class GestorDiario
{
     private List<EntradaDiario> diarios;
    public GestorDiario()
    {
        diarios = new List<EntradaDiario>();
    }
    
    public List<EntradaDiario> GetDiarios()
    {
        return diarios;
    }

    public void GuardarEntrada(EntradaDiario entrada)
    {
        FileStream crearArchivo = new FileStream("diario.txt", FileMode.Append);
        StreamWriter escritor = new StreamWriter(crearArchivo);
        try
        {
            if (entrada == null)
            {
                throw new ArgumentNullException(nameof(entrada), "La entrada no puede ser nula.");
            }
            escritor.WriteLine($"{entrada.GetFecha().ToShortDateString()}|{entrada.GetTitulo()}|{entrada.GetContenido()}");
            diarios.Add(entrada);
            escritor.Close();
            crearArchivo.Close();
        }
        catch (ArgumentNullException ex)
        {
            Console.WriteLine($"Error: {ex.Message}");
            return;
        }
        catch (UnauthorizedAccessException ex)
        {
            Console.WriteLine($"Error de acceso: {ex.Message}");
            return;
        }
        catch (System.Exception)
        {

            throw;
        }

    }


}