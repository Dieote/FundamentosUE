abstract class Vehiculo
{

    private String? marca;
    private String? modelo;
    private int? anio;

    public Vehiculo() { }
    public Vehiculo(String marca, String modelo, int anio){
        this.marca = marca;
        this.modelo = modelo;
        this.anio = anio;
    }


    public String? getMarca(){
        return marca;
    }

    public String? getModelo(){
        return modelo;
    }

    public int? getAnio(){
                return anio;
    }

    public abstract void MostrarDatos();
}