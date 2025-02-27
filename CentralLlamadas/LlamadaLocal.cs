abstract class LlamadaLocal : Llamada {

    public override double Coste {
        get{
            return Duracion * 0.50;
        }
    }

    public LlamadaLocal (string origen, string destino, int duracion) : base(origen, destino, duracion){ }
    
}