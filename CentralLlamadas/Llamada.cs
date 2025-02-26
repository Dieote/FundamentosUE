abstract class Llamada {

    private string NumOrigen { set; get;}
    private string NumDestino { set; get;}
    private int Duracion { set; get;}

    public abstract double Coste { set; get;}  //será abstracta para que cada tipo de llamada implemente su propio cálculo.

    public Llamada (string origen, string destino, int duracion){
        NumOrigen = origen;
        NumDestino = destino;
        Duracion = duracion;
    }

    public void MostrarDatos(){
        Console.WriteLine($"Origen: {NumOrigen}, Destino: {NumDestino}, Duracion: {Duracion}")
    }
    
}