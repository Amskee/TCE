<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<head>
	<link rel="stylesheet" type="text/css" href="tableStyle.css"/>
</head>
<body>
	<div class="cards-header">
		Student Profiles
	</div>
	<div id="cards-container">
	<xsl:for-each select="users/user">
		<div id="profile-table">
    		<div id="profile-table-header">
		        <h1><xsl:value-of select="RollNo"/></h1>
	    	</div>
	    	<div id="profile-table-content">
	        	<ul>
	        		<li><strong>Name: </strong><xsl:value-of select="userName"/></li>
	        		<li><strong>Email: </strong><xsl:value-of select="Email"/></li>
	        		<li><strong>Phone: </strong><xsl:value-of select="Phone"/></li>
	        		<li><strong>Interests: </strong>
						<xsl:for-each select="courses/course">
							<xsl:value-of select="."/>
							<xsl:choose>
    							<xsl:when test="position() != last()">, </xsl:when>
    							<xsl:otherwise>.</xsl:otherwise>
  							</xsl:choose>
						</xsl:for-each>
	        		</li>
        		</ul>
    		</div>
    	</div>
	</xsl:for-each>
	</div>
</body>
</html>	