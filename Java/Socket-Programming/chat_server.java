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
 
public class chat_server
{
     
    public static void main(String[] args) {
         
    ServerSocket ss;  //Server 
    Socket client; // to accept clients request
    String nm;
    String msg,smsg;
     
    try
    {
    ss = new ServerSocket(1212);
 
    System.out.println("Server is Waitng For Client");
    client = ss.accept();
 
    System.out.println("Client is Connected ");
 
    BufferedReader br =
 new BufferedReader(new InputStreamReader
(System.in));
    BufferedReader br1 = 
 new BufferedReader(new InputStreamReader
(client.getInputStream()));
 
    PrintStream ps = new
PrintStream(client.getOutputStream());
 
    while(true)
    {
    msg = br1.readLine();
    System.out.println("Message is "+msg);
if(msg.equals("bye"))
    {
        break;
    }
    System.out.println("Enter Your Message");
     smsg = br.readLine();
    ps.println(smsg);
     
    if(smsg.equals("bye"))
        {
            ps.println("bye");
            break;
        }
    }
    ps.close();
    br1.close();
    br.close();
     
    ss.close();
     
    }//try
    catch(Exception e)
    {
        System.out.println(e);
    }
 
}//main
}