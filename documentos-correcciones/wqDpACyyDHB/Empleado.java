
import java.security.MessageDigest;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class Empleado {

    public int id;
    public String nombre;
    public String apellido;
    public String correo;
    public String celular;
    public boolean esProveedor;
    public String salario;
    public String cargo;

    public Empleado(String nombre, String correo, String celular, String salario) {
        this.nombre = nombre;
        this.correo = correo;
        this.celular = celular;
        this.salario = salario;
    }

    public Empleado(int id, String nombre, String apellido, String correo, String celular, boolean esProveedor, String salario, String cargo) {
        this.id = id;
        this.nombre = nombre;
        this.apellido = apellido;
        this.correo = correo;
        this.celular = celular;
        this.esProveedor = esProveedor;
        this.salario = salario;
        this.cargo = cargo;
    }

    public Empleado(String nombre, String apellido, String correo, String celular, boolean esProveedor, String salario, String cargo) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.correo = correo;
        this.celular = celular;
        this.esProveedor = esProveedor;
        this.salario = salario;
        this.cargo = cargo;
    }

    public boolean Crear() {

        Conexion c = new Conexion();
        String sql = "INSERT INTO empleados VALUES(null,?,?,?,?,?,?,?)";
        boolean valor = false;
        try {

            PreparedStatement query = c.getConexion().prepareStatement(sql);
            query.setString(1, this.getNombre());
            query.setString(2, this.getApellido());
            query.setString(3, this.getCorreo());
            query.setString(4, this.getCelular());
            query.setBoolean(5, this.getEsProveedor());
            query.setString(6, this.getSalario());
            query.setString(7, this.getCargo());
            valor = query.execute();
            System.out.println("Empleado creado");

        } catch (Exception ex) {
            System.out.println("ERROR : " + ex.getMessage());
        }
        
        return valor;
    }

    public static ArrayList<Empleado> Leer() {

        ArrayList<Empleado> array = new ArrayList<Empleado>();
        Conexion c = new Conexion();
        String sql = "SELECT * FROM empleados";
        
        try {
            PreparedStatement query = c.getConexion().prepareStatement(sql);

            ResultSet rs = query.executeQuery();         
            while (rs.next()) {
                
                int id = rs.getInt(1);   
                String nombre = rs.getString(2);
                String apellido = rs.getString(3);
                String correo = rs.getString(4);
                String celular = rs.getString(5);
                boolean esProovedor = rs.getBoolean(6);
                String salario = rs.getString(7);
                String cargo = rs.getString(8);
                
                Empleado emp = new Empleado(id, nombre, apellido, correo, celular, esProovedor, salario, cargo);
                array.add(emp);
            }

        } catch (Exception ex) {
            System.out.println("ERROR : " + ex.getMessage());
        }
        return array;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getCelular() {
        return celular;
    }

    public void setCelular(String celular) {
        this.celular = celular;
    }

    public boolean getEsProveedor() {
        return esProveedor;
    }

    public void setEsProveedor(boolean esProveedor) {
        this.esProveedor = esProveedor;
    }

    public String getSalario() {
        return salario;
    }

    public void setSalario(String salario) {
        this.salario = salario;
    }

    public String getCargo() {
        return cargo;
    }

    public void setCargo(String cargo) {
        this.cargo = cargo;
    }

}
