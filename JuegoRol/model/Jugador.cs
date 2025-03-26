
public class Jugador{
    private string? nombre;
    private string? poderEspecial;
    private int nivelAtaque, nivelDefensa, nivelVida;
    public List<Habilidad> listaHablididades;
    private Tipo tipo;

    public Jugador(){}
    public Jugador(string nombre){
        this.nombre = nombre;
        nivelVida = 100;
       listaHablididades = new List<Habilidad> ();
    }

    
    public Jugador(string nombre, string poder){
        this.nombre = nombre;
        poderEspecial = poder;
        nivelVida = 100;
       listaHablididades = new List<Habilidad> ();
    }

    public Jugador(string nombre, int nivelAtaque, int nivelDefensa, Tipo tipo){
        this.nombre = nombre;
        this.nivelAtaque = nivelAtaque;
        this.nivelDefensa = nivelDefensa;
        nivelVida = 100;
       listaHablididades = new List<Habilidad> ();
        this.tipo = tipo;
           }

public Jugador(string nombre, int nivelAtaque, int nivelDefensa, List<Habilidad> lista){
        this.nombre = nombre;
        nivelVida = 100;
        this.nivelDefensa = nivelDefensa;
        this.nivelAtaque = nivelAtaque;
        listaHablididades = lista;
    }

public Jugador(string nombre, int nivelAtaque, int nivelDefensa, List<Habilidad> lista, Tipo tipo){
        this.nombre = nombre;
        nivelVida = 100;
        this.nivelDefensa = nivelDefensa;
        this.nivelAtaque = nivelAtaque;
        listaHablididades = lista;
        this.tipo = tipo;
    }
    public void ListarHabilidades(){
         foreach (var item in listaHablididades){
            Console.WriteLine("Nombre: " + item.GetNombre());
            Console.WriteLine("Potenciador: " + item.GetPotenciador());
            Console.WriteLine("Vida: " + item.GetVida());
        }
    }

    public void MostrarDatos(){
        Console.WriteLine("Nombre: " + nombre + " - Jugador: " + tipo);
        Console.WriteLine("Nivel de ataque: " + nivelAtaque + " / Defensa: " + nivelDefensa);
        Console.WriteLine("Nivel de vida: " + nivelVida);
    }

}