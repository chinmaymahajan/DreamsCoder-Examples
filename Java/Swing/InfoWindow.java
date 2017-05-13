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
import java.awt.*;
import javax.swing.*;

class InfoWindow {

    JFrame f;
    JPanel p1, p2;
    JLabel l1, l2, l3, l4;
    JTextField t1, t2, t3, t4;
    JRadioButton b1, b2, b3;
    ButtonGroup bg;
    JComboBox b;
    JCheckBox c1, c2, c3;

    InfoWindow() {
        f = new JFrame("Information");
        f.setBounds(200, 200, 300, 275);
        p1 = new JPanel(new GridLayout(4, 2));
        p2 = new JPanel(new GridLayout(3, 2));
        l1 = new JLabel("Your Name : ");
        l2 = new JLabel("Name : ");
        l3 = new JLabel("Year : ");
        l4 = new JLabel("Hobbies : ");
        t1 = new JTextField(10);
        t2 = new JTextField(10);
        t3 = new JTextField(10);
        t4 = new JTextField(10);
        bg = new ButtonGroup();
        b1 = new JRadioButton("FY", true);
        b2 = new JRadioButton("SY");
        b3 = new JRadioButton("TY");
        c1 = new JCheckBox("Music", true);
        c2 = new JCheckBox("Dance");
        c3 = new JCheckBox("Sports");
        bg.add(b1);
        bg.add(b2);
        bg.add(b3);
        p1.add(b1);
        p1.add(c1);
        p1.add(b2);
        p1.add(c2);
        p1.add(b3);
        p1.add(c3);
        p2.add(l2);
        p2.add(t2);
        p2.add(l3);
        p2.add(t3);
        p2.add(l4);
        p2.add(t4);
        f.add(l1);
        f.add(t1);
        f.add(p1);
        f.add(p2);
        f.setLayout(new FlowLayout());
        f.setVisible(true);
    }

    public static void main(String[] arg) {
        InfoWindow w = new InfoWindow();
    }
}
