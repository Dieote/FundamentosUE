class Main{

    static void Main(string[] args){

        Central central = new Central();

        //Realizamos llamadas

        central.RegistrarLlamadas(new LlamadaLocal("654876343", "632231897", 10));
        central.RegistrarLlamadas(new LlamadaNacional("664766333", "34765987231", 8, LlamadaNacional.FranjaHoraria.Tarde));
        central.RegistrarLlamadas(new LlamadaProvincial("687234099", "632231897", 15));
    
        central.MostararLlamadas();

        central.MostarCosteTotal();
    }
}