class LlamadaLocal : Llamada {

    public string NumeroOrigen { get; }
    public string NumeroDestino { get; }
    
    private const double TarifaLocal= 0.50;
    public override double Coste {
        get{
            return Duracion * TarifaLocal;
        }
    }

    public LlamadaLocal (string origen, string destino, int duracion) : base(origen, destino, duracion){ }
    
}