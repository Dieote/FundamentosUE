using System.ComponentModel;
using System.Runtime.CompilerServices;

public class Jugador{
    private string? nombre;
    private string? poderEspecial;
    private int nivelAtaque, nivelDefensa, nivelVida;
    public List<Habilidad> listaHablididades;
    public Jugador(){}
    public Jugador(string nombre){
        this.nombre = nombre;
        this.nivelVida = 100;
       this.listaHablididades = new List<Habilidad> ();
    }

    public Jugador(string nombre, string poder){
        this.nombre = nombre;
        this.poderEspecial = poder;
        this.nivelVida = 100;
       this.listaHablididades = new List<Habilidad> ();
    }

    public Jugador(string nombre, int nivelAtaque, int nivelDefensa){
        this.nombre = nombre;
        this.nivelAtaque = nivelAtaque;
        this.nivelDefensa = nivelDefensa;
        nivelVida = 100;
       this.listaHablididades = new List<Habilidad> ();
    }

public Jugador(string nombre, int nivelAtaque, int nivelDefensa, List<Habilidad> lista){
        this.nombre = nombre;
        this.nivelVida = 100;
        this.nivelDefensa = nivelDefensa;
        this.nivelAtaque = nivelAtaque;
       this.listaHablididades = lista;
    }

public void ListarHabilidades(){
    foreach (var item in listaHablididades){
        Console.WriteLine("Nombre: " + item.GetNombre());
        Console.WriteLine("Potenciador: " + item.GetPotenciador());
        Console.WriteLine("Nombre: " + item.GetVida());
    }
}


}