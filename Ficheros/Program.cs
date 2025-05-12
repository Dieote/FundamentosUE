﻿class Program
{
    public static void Main(string[] args)
    {
        Console.WriteLine("Trabajo con ficheros");
        Operaciones operaciones = new Operaciones();
        //operaciones.ObtenerInformacion(@"\Users\Usuario\Documents\GitHub\FundamentosUE\Ficheros\informacion.txt");
        //operaciones.EscribirFichero(@"\Users\Usuario\Documents\GitHub\FundamentosUE\Ficheros\informacion.txt");
        operaciones.LeerFichero(@"\Users\Usuario\Documents\GitHub\FundamentosUE\Ficheros\informacion.txt");
        //operaciones.ExportarUsuarios(@"\Users\Usuario\Documents\GitHub\FundamentosUE\Ficheros\informacion.txt");
    }
}