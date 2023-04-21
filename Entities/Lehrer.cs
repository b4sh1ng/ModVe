using System;
using System.Collections.Generic;

namespace ModVe.Entities;

public partial class Lehrer
{
    public int Lid { get; set; }

    public string Lname { get; set; } = null!;

    public string? Lvname { get; set; }
}
