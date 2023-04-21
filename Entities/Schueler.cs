using System;
using System.Collections.Generic;

namespace ModVe.Entities;

public partial class Schueler
{
    public int Snr { get; set; }

    public string Sname { get; set; } = null!;

    public string? Svname { get; set; }

    public DateTime? Gebd { get; set; }

    public string? Str { get; set; }

    public string? Plz { get; set; }

    public string? Ort { get; set; }
}
