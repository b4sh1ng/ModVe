using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;

namespace ModVe.Entities;

public partial class ModveContext : DbContext
{
    public ModveContext()
    {
    }

    public ModveContext(DbContextOptions<ModveContext> options)
        : base(options)
    {
    }

    public virtual DbSet<Lehrer> Lehrers { get; set; }

    public virtual DbSet<Module> Modules { get; set; }

    public virtual DbSet<Modulzuordnung> Modulzuordnungs { get; set; }

    public virtual DbSet<Raeume> Raeumes { get; set; }

    public virtual DbSet<Schueler> Schuelers { get; set; }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder) { }

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<Lehrer>(entity =>
        {
            entity.HasKey(e => e.Lid).HasName("PRIMARY");

            entity.ToTable("lehrer");

            entity.Property(e => e.Lid).HasColumnType("int(11)");
            entity.Property(e => e.Lname).HasMaxLength(100);
            entity.Property(e => e.Lvname)
                .HasMaxLength(100)
                .HasDefaultValueSql("'NULL'");
        });

        modelBuilder.Entity<Module>(entity =>
        {
            entity.HasKey(e => e.Modnr).HasName("PRIMARY");

            entity.ToTable("module");

            entity.Property(e => e.Modnr).HasColumnType("int(11)");
            entity.Property(e => e.Lid).HasColumnType("int(11)");
            entity.Property(e => e.Modu).HasMaxLength(100);
            entity.Property(e => e.Mstd)
                .HasDefaultValueSql("'NULL'")
                .HasColumnType("int(11)");
            entity.Property(e => e.Rnr)
                .HasDefaultValueSql("'NULL'")
                .HasColumnType("int(11)");
        });

        modelBuilder.Entity<Modulzuordnung>(entity =>
        {
            entity.HasKey(e => new { e.Modnr, e.Snr }).HasName("PRIMARY");

            entity.ToTable("modulzuordnung");

            entity.Property(e => e.Modnr).HasColumnType("int(11)");
            entity.Property(e => e.Snr).HasColumnType("int(11)");
        });

        modelBuilder.Entity<Raeume>(entity =>
        {
            entity.HasKey(e => e.Rnr).HasName("PRIMARY");

            entity.ToTable("raeume");

            entity.Property(e => e.Rnr).HasColumnType("int(11)");
            entity.Property(e => e.Panz)
                .HasDefaultValueSql("'NULL'")
                .HasColumnType("int(11)");
        });

        modelBuilder.Entity<Schueler>(entity =>
        {
            entity.HasKey(e => e.Snr).HasName("PRIMARY");

            entity.ToTable("schueler");

            entity.Property(e => e.Snr).HasColumnType("int(11)");
            entity.Property(e => e.Gebd)
                .HasDefaultValueSql("'NULL'")
                .HasColumnType("date")
                .HasColumnName("gebd");
            entity.Property(e => e.Ort)
                .HasMaxLength(100)
                .HasDefaultValueSql("'NULL'");
            entity.Property(e => e.Plz)
                .HasMaxLength(10)
                .HasDefaultValueSql("'NULL'")
                .HasColumnName("PLZ");
            entity.Property(e => e.Sname).HasMaxLength(100);
            entity.Property(e => e.Str)
                .HasMaxLength(100)
                .HasDefaultValueSql("'NULL'");
            entity.Property(e => e.Svname)
                .HasMaxLength(100)
                .HasDefaultValueSql("'NULL'");
        });

        OnModelCreatingPartial(modelBuilder);
    }

    partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
}
