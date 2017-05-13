/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ankana;

/**
 *
 * @author chinmay
 */
import java.io.*;
import java.net.*;
 
public class chat_client
{
 
    public static void main(String[] args) 
    {
        Socket s;
        try
        {
        s = new Socket("127.0.0.1",1212);
        String msg,umsg;
        System.out.println("Clent is Conneccted to the Server");
         
        BufferedReader br = new
BufferedReader(new InputStreamReader(System.in));
        BufferedReader br1 = new
BufferedReader(new InputStreamReader(s.getInputStream()));
 
        PrintStream ps = new PrintStream
(s.getOutputStream());
        while(true)
        {
        System.out.println("Enter Your Message");
        msg = br.readLine();
        if(msg.equals("bye"))
            {
            break;
            }
        ps.println(msg);
        umsg = br1.readLine();
        System.out.println(umsg);
             
        if(umsg.equals("bye"))
        {
            ps.println("bye");
            break;
        }
        }   
         
    br1.close();
    ps.close();
    br.close();
     
    s.close();
 
    }
    catch(Exception e)
    {
        System.out.println(""+e);
    }//catch
    }//main
}

