var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// houses table
houses_addTip=["",spacer+"This option allows all members of the group to add records to the 'Houses' table. A member who adds a record to the table becomes the 'owner' of that record."];

houses_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Houses' table."];
houses_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Houses' table."];
houses_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Houses' table."];
houses_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Houses' table."];

houses_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Houses' table."];
houses_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Houses' table."];
houses_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Houses' table."];
houses_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Houses' table, regardless of their owner."];

houses_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Houses' table."];
houses_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Houses' table."];
houses_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Houses' table."];
houses_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Houses' table."];

// tenants table
tenants_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tenants' table. A member who adds a record to the table becomes the 'owner' of that record."];

tenants_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tenants' table."];
tenants_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tenants' table."];
tenants_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tenants' table."];
tenants_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tenants' table."];

tenants_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tenants' table."];
tenants_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tenants' table."];
tenants_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tenants' table."];
tenants_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tenants' table, regardless of their owner."];

tenants_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tenants' table."];
tenants_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tenants' table."];
tenants_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tenants' table."];
tenants_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tenants' table."];

// invoices table
invoices_addTip=["",spacer+"This option allows all members of the group to add records to the 'Invoices' table. A member who adds a record to the table becomes the 'owner' of that record."];

invoices_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Invoices' table."];
invoices_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Invoices' table."];
invoices_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Invoices' table."];
invoices_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Invoices' table."];

invoices_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Invoices' table."];
invoices_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Invoices' table."];
invoices_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Invoices' table."];
invoices_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Invoices' table, regardless of their owner."];

invoices_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Invoices' table."];
invoices_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Invoices' table."];
invoices_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Invoices' table."];
invoices_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Invoices' table."];

// payments table
payments_addTip=["",spacer+"This option allows all members of the group to add records to the 'Payments' table. A member who adds a record to the table becomes the 'owner' of that record."];

payments_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Payments' table."];
payments_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Payments' table."];
payments_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Payments' table."];
payments_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Payments' table."];

payments_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Payments' table."];
payments_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Payments' table."];
payments_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Payments' table."];
payments_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Payments' table, regardless of their owner."];

payments_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Payments' table."];
payments_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Payments' table."];
payments_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Payments' table."];
payments_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Payments' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
