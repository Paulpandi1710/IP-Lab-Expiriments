<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %> 
<%@ page import="java.util.List" %> 
<%@ page import="com.shopping.model.Order" %> 
<%@ page import="com.shopping.dao.OrderDAO" %> 
<!DOCTYPE html> 
<html> 
<head> 
 <meta charset="UTF-8"> 
 <title>Order Details</title> 
 <style> 
 * { 
 box-sizing: border-box; 
 } 
 body { 
 margin: 0; 
 padding: 0; 
 font-family: Arial, sans-serif; 
 background: linear-gradient(135deg, #667eea, #764ba2); 
 min-height: 100vh; 
 } 
 .container { 
 width: 95%; 
 max-width: 1200px; 
 margin: 50px auto; 
 background: white; 
 padding: 30px; 
 border-radius: 15px; 
 box-shadow: 0 10px 30px rgba(0,0,0,0.2); 
 } 
 h1 { 
 text-align: center; 
 color: #333333; 
 margin-bottom: 10px; 
 } 
 .subtitle { 
 text-align: center; 
 color: #777; 
 margin-bottom: 30px; 
 } 
 table { 
 width: 100%; 
 border-collapse: collapse; 
 overflow: hidden; 
 border-radius: 10px; 
 } 
 th { 
 background: #667eea; 
 color: white; 
 padding: 15px 10px; 
 text-align: center; 
 } 
 td { 
 padding: 13px 10px; 
 text-align: center; 
 border-bottom: 1px solid #ddd; 
 color: #444; 
 } 
 tr:hover { 
 background-color: #f5f5ff; 
 } 
 .total { 
 font-weight: bold; 
 color: #667eea; 
 } 
 .price { 
 font-weight: bold; 
 } 
 .btn-container { 
 text-align: center; 
 margin-top: 30px; 
 } 
 .btn { 
 display: inline-block; 
 padding: 12px 25px; 
 background: #667eea; 
 color: white; 
 text-decoration: none; 
 border-radius: 8px; 
 font-weight: bold; 
 transition: 0.3s; 
 } 
 .btn:hover { 
 background: #4f5fd1; 
 } 
 @media (max-width: 800px) { 
 .container { 
 width: 98%; 
 padding: 15px; 
 overflow-x: auto; 
 } 
 table { 
 min-width: 900px; 
 } 
 } 
 </style> 
</head> 
<body> 
<div class="container"> 
 <h1>Order Details</h1> 
 <p class="subtitle">All Customer Orders</p> 
 <table> 
 <tr> 
 <th>Order ID</th> 
 <th>Customer</th> 
 <th>Product</th> 
 <th>Quantity</th> 
 <th>Price</th> 
 <th>Total</th> 
 <th>Date</th> 
 <th>Address</th> 
 </tr> 
 <% 
 OrderDAO dao = new OrderDAO(); 
 List<Order> orders = dao.getAllOrders(); 
 for (Order order : orders) { 
 %> 
 <tr> 
 <td> 
 <%= order.getOrderId() %> 
 </td> 
 <td> 
 <%= order.getCustomerName() %> 
 </td> 
 <td> 
 <%= order.getProductName() %> 
 </td> 
 <td> 
 <%= order.getQuantity() %> 
 </td> 
 <td class="price"> 
 ₹<%= order.getPrice() %> 
 </td> 
 <td class="total"> 
 ₹<%= order.getTotalAmount() %> 
 </td> 
 <td> 
 <%= order.getOrderDate() %> 
 </td> 
 <td> 
 <%= order.getAddress() %> 
 </td> 
 </tr> 
 <% 
 } 
 %> 
 </table> 
 <div class="btn-container"> 
 <a href="orderForm.jsp" class="btn"> 
 ➕ Place New Order 
 </a> 
 </div> 
</div> 
</body> 
</html>
