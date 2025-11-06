class Program{

    static void Main(string[] args){

        Central central = new Central();
        
        //Realizamos llamadas

        central.RegistrarLlamadas(new LlamadaLocal("654876343", "632231897", 10));
        central.RegistrarLlamadas(new LlamadaNacional("664766333", "34765987231", 8, LlamadaNacional.FranjaHoraria.Tarde));
        central.RegistrarLlamadas(new LlamadaProvincial("687234099", "632231897", 15));
    
        central.MostrarLlamadas();
        central.MostrarCosteTotal();

        central.RegistrarLlamadas(new LlamadaLocal("653322313", "638363497", 15));
        central.RegistrarLlamadas(new LlamadaNacional("6878766333", "3472318231", 30, LlamadaNacional.FranjaHoraria.Noche));
        central.RegistrarLlamadas(new LlamadaProvincial("687899099", "6326598797", 25));

        central.MostrarLlamadas();
        central.MostrarCosteTotal();
    }
}