package com.shopping.dao; 
import com.shopping.model.Order; 
import com.shopping.util.DBConnection; 
import java.sql.Connection; 
import java.sql.PreparedStatement; 
import java.sql.ResultSet; 
import java.util.ArrayList; 
import java.util.List; 

public class OrderDAO { 
 public boolean addOrder(Order order) { 
 String sql = "INSERT INTO orders " 
 + "(customer_name, product_name, quantity, price, " 
 + "total_amount, order_date, address) " 
 + "VALUES (?, ?, ?, ?, ?, ?, ?)"; 
 try { 
 Connection con = DBConnection.getConnection(); 
 PreparedStatement ps = con.prepareStatement(sql); 
 ps.setString(1, order.getCustomerName()); 
 ps.setString(2, order.getProductName()); 
 ps.setInt(3, order.getQuantity()); 
 ps.setBigDecimal(4, order.getPrice()); 
 ps.setBigDecimal(5, order.getTotalAmount()); 
 ps.setDate(6, order.getOrderDate()); 
 ps.setString(7, order.getAddress()); 
 int result = ps.executeUpdate(); 
 ps.close(); 
 con.close(); 
 return result > 0; 
 } catch (Exception e) { 
 throw new RuntimeException(e); 
 } 
 } 
 
 public List<Order> getAllOrders() { 
 List<Order> orders = new ArrayList<>(); 
 String sql = "SELECT * FROM orders ORDER BY order_id DESC"; 
 try { 
 Connection con = DBConnection.getConnection(); 
 PreparedStatement ps = con.prepareStatement(sql); 
 ResultSet rs = ps.executeQuery(); 
 while (rs.next()) { 
 Order order = new Order(); 
 order.setOrderId(rs.getInt("order_id")); 
 order.setCustomerName(rs.getString("customer_name")); 
 order.setProductName(rs.getString("product_name")); 
 order.setQuantity(rs.getInt("quantity")); 
 order.setPrice(rs.getBigDecimal("price")); 
 order.setTotalAmount(rs.getBigDecimal("total_amount")); 
 order.setOrderDate(rs.getDate("order_date")); 
 order.setAddress(rs.getString("address")); 
 orders.add(order); 
 } 
 rs.close(); 
 ps.close(); 
 con.close(); 
 } catch (Exception e) { 
 throw new RuntimeException(e); 
 } 
 return orders; 
 } 
}
