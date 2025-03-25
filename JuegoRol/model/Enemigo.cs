//Calase base del resto de los elementos --> Superclase
abstract class Enemigo {

    public string nombre  { get; set;}

    public int vida { get; set;}

    public int poder { get; set;}

    public Perfil perfil { get; set;}
    public Enemigo(){}
    public Enemigo(string nombre, int vida, int poder, Perfil perfil){
        this.nombre = nombre;
        this.vida = vida;
        this.poder = poder;
        this.perfil = perfil;
    }

    public Enemigo(string nombre){
        this.nombre = nombre;
        this.vida = 100;
        this.poder = 150;
    }

    public virtual void mostrarDatos(){
        Console.WriteLine("El nombre de enemigo es " + nombre);
        Console.WriteLine("El poder de enemigo es " + poder);
        Console.WriteLine("La vida de enemigo es " + vida);
        Console.WriteLine("El perfil de enemigo es " + perfil.Nombre);
    }

    public abstract void realizarAtaque();
        





}