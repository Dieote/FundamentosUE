public class Entrenamiento{
    public double Distancia { get; set;}
    public double Tiempo { get; set;}
    public string TipoEjercicio { get; set;}

public Entrenamiento(double distancia, double tiempo, string tipoEjercicio){
    Distancia = distancia;
    Tiempo = tiempo;
    TipoEjercicio = tipoEjercicio;
}

public void MostrarEntrenamiento(){
    Console.WriteLine($"Tipo: {TipoEjercicio}, Distancia: {Distancia} km, Tiempo: {Tiempo} minutos");
}
}