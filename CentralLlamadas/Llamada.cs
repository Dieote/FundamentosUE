abstract class Llamada {

    public string NumOrigen { set; get;}
    public string NumDestino { set; get;}
    public int Duracion { set; get;}
    public abstract double Coste { get;}  //será abstracta para que cada tipo de llamada implemente su propio cálculo.

    public Llamada (string origen, string destino, int duracion){
        NumOrigen = origen;
        NumDestino = destino;
        Duracion = duracion;
    }

    public virtual void MostrarDatos(){
        Console.WriteLine($"Origen: {NumOrigen}, Destino: {NumDestino}, Duracion: {Duracion}");
    }
    
}