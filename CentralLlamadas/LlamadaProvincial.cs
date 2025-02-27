abstract class LlamadaProvincial : Llamada {

    private const double TarifaProvincial = 0.20;
    public override double Coste{
        get{
            return Duracion * TarifaProvincial;
        }
    }
    public LlamadaProvincial (string origen, string destino, int duracion) : base(origen, destino, duracion){ }
    
}