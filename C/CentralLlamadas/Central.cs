class Central{

    private List<Llamada> llamados = new List<Llamada>();

    public void RegistrarLlamadas(Llamada llamado){
        llamados.Add(llamado);
        Console.WriteLine("Llamada Registrada");
        llamado.MostrarDatos();
    }

    public void MostrarLlamadas(){
        Console.WriteLine("**Lista de llamadas: ");
        foreach (var llamado in llamados){
            llamado.MostrarDatos();
        }
    }

    public void MostrarCosteTotal(){
        double total = 0;
        foreach (var llamado in llamados){
            total += llamado.Coste;
        }
        Console.WriteLine($"**Coste total de llamadas: € {total}");  
    }
}
