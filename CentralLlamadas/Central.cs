class Central{

    private List<Llamadas> llamados = new List<Llamadas>();

    public void RegistrarLlamadas(Llamada llamado){
        llamados.add(llamado);
        Console.WriteLine("Llamada Registarada");
        llamado.MostrarDatos();
    }

    public void MostararLlamadas(){
        Console.WriteLine("/n*Lista de llamadas: ");
        foreach (var llamado in llamados){
            llamado.MostrarDatos();
        }
    }

    public void MostarCosteTotal(){
        double total = 0;
        foreach (var llamado in llamados){
            total += llamado.Coste;
        }
        Console.WriteLine($"/n*Coste total de llamadas: € {total}");  
    }
}
