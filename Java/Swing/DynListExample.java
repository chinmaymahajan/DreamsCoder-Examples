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
import java.util.*;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;

class DynListExample
        extends JFrame
        implements ActionListener,
        ListSelectionListener {
// Instance attributes used in this example

    private JPanel topPanel;
    private JList listbox;
    private Vector listData;
    private JButton addButton;
    private JButton removeButton;
    private JTextField dataField;
    private JScrollPane scrollPane;

    // Constructor of main frame
    public DynListExample() {
// Set the frame characteristics
        setTitle("Advanced List Box Application");
        setSize(300, 100);
        setBackground(Color.gray);

// Create a panel to hold all other components
        topPanel = new JPanel();
        topPanel.setLayout(new BorderLayout());
        getContentPane().add(topPanel);

// Create the data model for this example
        listData = new Vector();

// Create a new listbox control
        listbox = new JList(listData);
        listbox.
                addListSelectionListener(this);

// Add the listbox to a scrolling pane
        scrollPane = new JScrollPane();
        scrollPane.getViewport().add(listbox);
        topPanel.add(scrollPane, BorderLayout.CENTER);

        CreateDataEntryPanel();
    }

    public void CreateDataEntryPanel() {
// Create a panel to hold all other components
        JPanel dataPanel = new JPanel();
        dataPanel.setLayout(
                new BorderLayout());
        topPanel.add(dataPanel, BorderLayout.SOUTH);

        // Create some function buttons
        addButton = new JButton("Add");
        dataPanel.add(addButton, BorderLayout.WEST);
        addButton.addActionListener(this);

        removeButton = new JButton("Delete");
        dataPanel.add(removeButton, BorderLayout.EAST);
        removeButton.addActionListener(this);

// Create a text field for data entry and display
        dataField = new JTextField();
        dataPanel.add(dataField, BorderLayout.CENTER);
    }

// Handler for list selection changes
    public void valueChanged(
            ListSelectionEvent event) {
        // See if this is a listbox selection and the
// event stream has settled
        if (event.getSource() == listbox
                && !event.getValueIsAdjusting()) {
// Get the current selection and place it in the        // edit field
            String stringValue = (String) listbox.getSelectedValue();
            if (stringValue != null) {
                dataField.setText(stringValue);
            }
        }
    }

// Handler for button presses
    public void actionPerformed(ActionEvent event) {
        String stringValue = (String) listbox.getSelectedValue();
        if (event.getSource() == addButton) {

// Get the text field value         String stringValue = dataField.getText();
            dataField.setText("");

            // Add this item to the list and refresh
            if (stringValue != null) {
                listData.addElement(stringValue);
                listbox.setListData(listData);
                scrollPane.revalidate();
                scrollPane.repaint();
            }
        }

        if (event.getSource() == removeButton) {
            // Get the current selection
            int selection = listbox.getSelectedIndex();
            if (selection >= 0) {
// Add this item to the list and refresh
                listData.removeElementAt(selection);
                listbox.setListData(listData);
                scrollPane.revalidate();
                scrollPane.repaint();

// As a nice touch, select the next item
                if (selection >= listData.size()) {
                    selection = listData.size() - 1;
                }
                listbox.setSelectedIndex(selection);
            }
        }
    }

    // Main entry point for this example
    public static void main(String args[]) {
// Create an instance of the test application
        DynListExample mainFrame
                = new DynListExample();
        mainFrame.setVisible(true);
    }
}
