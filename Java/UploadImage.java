
/**
 *
 * @author chinmay
 */
import java.awt.*;
import java.awt.event.*;
import java.awt.image.*;
import javax.imageio.*;
import javax.swing.*;
import java.io.*;

class Accept implements ActionListener {

    String ImageName;
    JFrame f;
    JFileChooser file;
    JButton Browse, Ok;
    JTextField a;

    public Accept() {
        f = new JFrame("Select Image");
        f.setBounds(400, 200, 400, 100);
        f.setLayout(new FlowLayout());
        Browse = new JButton("Browse");
        Browse.addActionListener(this);
        Ok = new JButton("Show Image");
        Ok.addActionListener(this);
        a = new JTextField(20);
        f.add(a);
        f.add(Browse);
        f.add(Ok);
        f.setVisible(true);
    }

    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == Ok) {
            if (a.getText().equals("")) {
                JOptionPane.showMessageDialog(f, "Please Select an Image", "Error", JOptionPane.ERROR_MESSAGE);
            } else {

                ImageName = a.getText();
                new GraphicsSetA4(ImageName);
            }
        } else if (e.getSource() == Browse) {
            file = new JFileChooser();
            file.showOpenDialog(f);

            String s = file.getSelectedFile().getAbsolutePath();
            a.setText(s);
        }
    }
}

public class UploadImage extends JFrame {

    Font f;
    BufferedImage image;
    File file;

    public GraphicsSetA4(String Image) {
        super("Frame");
        file = new File(Image);
        try {
            image = ImageIO.read(file);
        } catch (IOException e) {
            System.out.println(e);
        }
        setBounds(400, 200, 430, 400);
        setVisible(true);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
    }

    public void paint(Graphics g) {
        g.drawImage(image, 0, 0, null);
    }

    public static void main(String[] arg) {
        new Accept();
    }
}
