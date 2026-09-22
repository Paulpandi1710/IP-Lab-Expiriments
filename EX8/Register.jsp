<%@ page language="java" 
 contentType="text/html; charset=UTF-8" 
 pageEncoding="UTF-8" %> 
<!DOCTYPE html> 
<html> 
<head> 
 <title>Registration Successful</title> 
 <style> 
 body { 
 font-family: Arial, sans-serif; 
 background-color: #f2f2f2; 
 } 
 .details-container { 
 width: 500px; 
 margin: 50px auto; 
 background: #ffffff; 
 padding: 25px 30px; 
 border-radius: 8px; 
 box-shadow: 0 0 10px rgba(0,0,0,0.2); 
 } 
 h2 { 
 text-align: center; 
 color: #333333; 
 } 
 table { 
 width: 100%; 
 border-collapse: collapse; 
 margin-top: 15px; 
 } 
 td { 
 padding: 10px; 
 border-bottom: 1px solid #eeeeee; 
 } 
 td.label { 
 font-weight: bold; 
 color: #555555; 
 width: 45%; 
 } 
 </style> 
</head> 
<body> 
<% 
 String username = request.getParameter("username"); 
 String password = request.getParameter("password"); 
 String name = request.getParameter("name"); 
 String ccnumber = request.getParameter("ccnumber"); 
 String email = request.getParameter("email"); 
 String phone = request.getParameter("phone"); 
%> 
<div class="details-container"> 
 <h2>Registration Successful</h2> 
 <table> 
 <tr> 
 <td class="label">User Name:</td> 
 <td><%= username %></td> 
 </tr> 
 <tr> 
 <td class="label">Password:</td> 
 <td><%= password %></td> 
 </tr> 
 <tr> 
 <td class="label">Name:</td> 
 <td><%= name %></td> 
 </tr> 
 <tr> 
 <td class="label">Credit Card Number:</td> 
 <td><%= ccnumber %></td> 
 </tr> 
 <tr> 
 <td class="label">Email:</td> 
 <td><%= email %></td> 
 </tr> 
 <tr> 
 <td class="label">Phone Number:</td> 
 <td><%= phone %></td> 
 </tr> 
 </table> 
</div> 
</body> 
</html>
