using System;
using System.Collections.Generic;

namespace ModVe.Entities;

public partial class Module
{
    public int Modnr { get; set; }

    public string Modu { get; set; } = null!;

    public int? Mstd { get; set; }

    public int Lid { get; set; }

    public int? Rnr { get; set; }
}
