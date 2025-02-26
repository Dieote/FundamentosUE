class LlamadaNacional : Llamada {

    public enum FranjaHoraria{Mañana, Tarde, Noche} //lista de valores enum, usa el indice 
    
    private static double[] Tarifas = {0.20 , 0.25, 0.30};

    public FranjaHoraria Franja { get; }
    public override double Coste = Duracion * Tarifas[(int)Franja];

    public LlamadaNacional (string origen, string destino, int duracion, FranjaHoraria franja) : base(origen, destino, duracion){
        this.Franja = franja;
     }
    
    public override void MostrarDatos(){

        base.MostrarDatos();
        Console.WriteLine($"Franja horaria: {Franja}");
    }
}