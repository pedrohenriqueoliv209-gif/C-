using System;

Console.WriteLine("Escolha um numero: ");
int numero = int.Parse(Console.ReadLine());
Console.WriteLine("Escolha uma expreção aritimética: ");
string expressao = Console.ReadLine();
Console.WriteLine("Escolha um numero: ");
int numero2 = int.Parse(Console.ReadLine());

switch (expressao)
{
    case "+":
        Console.WriteLine(numero + numero2);
        break;
    case "-":
        Console.WriteLine(numero - numero2);
        break;
    case "*":
        Console.WriteLine(numero * numero2);
        break;
    case "/":
        Console.WriteLine(numero / numero2);
        break;
    default:
        Console.WriteLine("Expreção aritimética inválida");
        break;
}
