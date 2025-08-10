<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide - Web Wiz Forums
'**                                                              
'**  Copyright 2001-2002 Bruce Corkhill All Rights Reserved.                                
'**
'**  This program is free software; you can modify (at your own risk) any part of it 
'**  under the terms of the License that accompanies this software and use it both 
'**  privately and commercially.
'**
'**  All copyright notices must remain in tacked in the scripts and the 
'**  outputted HTML.
'**
'**  You may use parts of this program in your own private work, but you may NOT
'**  redistribute, repackage, or sell the whole or any part of this program even 
'**  if it is modified or reverse engineered in whole or in part without express 
'**  permission from the author.
'**
'**  You may not pass the whole or any part of this application off as your own work.
'**   
'**  All links to Web Wiz Guide and powered by logo's must remain unchanged and in place
'**  and must remain visible when the pages are viewed unless permission is first granted
'**  by the copyright holder.
'**
'**  This program is distributed in the hope that it will be useful,
'**  but WITHOUT ANY WARRANTY; without even the implied warranty of
'**  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR ANY OTHER 
'**  WARRANTIES WHETHER EXPRESSED OR IMPLIED.
'**
'**  You should have received a copy of the License along with this program; 
'**  if not, write to:- Web Wiz Guide, PO Box 4982, Bournemouth, BH8 8XP, United Kingdom.
'**    
'**
'**  No official support is available for this program but you may post support questions at: -
'**  http://www.webwizguide.info/forum
'**
'**  Support questions are NOT answered by e-mail ever!
'**
'**  For correspondence or non support questions contact: -
'**  info@webwizguide.com
'**
'**  or at: -
'**
'**  Web Wiz Guide, PO Box 4982, Bournemouth, BH8 8XP, United Kingdom
'**
'****************************************************************************************


'Global
'---------------------------------------------------------------------------------
Const strTxtWelcome = "Welcome"
Const strTxtWelcomeGuest = "Welcome Guest"
Const strTxtAllForums = "All Forums"
Const strTxtTopics = "Topics"
Const strTxtPosts = "Posts"
Const strTxtLastPost = "Last Post"
Const strTxtPostPreview = "Post Preview"
Const strTxtAt = "at"
Const strTxtBy = "By"
Const strTxtOn = "on"
Const strTxtProfile = "Profile"
Const strTxtSearch = "Search"
Const strTxtQuote = "Quote"
Const strTxtVisit = "Visit"
Const strTxtView = "View"
Const strTxtHome = "Home"
Const strTxtHomepage = "Homepage"
Const strTxtEdit = "Edit"
Const strTxtDelete = "Delete"
Const strTxtEditProfile = "Edit Profile"
Const strTxtLogOff = "Log Off"
Const strTxtRegister = "Register"
Const strTxtLogin = "Login"
Const strTxtMembersList = "Display List of Forum Members"
Const strTxtForumLocked = "Forum Locked"
Const strTxtSearchTheForum = "Search The Forum"
Const strTxtPostReply = "Post Reply"
Const strTxtNewTopic = "Post New Topic"
Const strTxtCloseWindow = "Close Window"
Const strTxtNoForums = "There are no Forum's to display"
Const strTxtReturnToDiscussionForum = "Return to the Discussion Forum"
Const strTxtMustBeRegistered = "You must be a registered user in order to be able to use this forum"
Const strClickHereIfNotRegistered = "Click here if you are not a registered user"
Const strTxtResetForm = "Reset Form"
Const strTxtClearForm = "Clear Form"
Const strTxtYes = "Yes"
Const strTxtNo = "No"
Const strTxtForumLockedByAdmim = "Sorry, this function has been disabled.<br>This Forum has been locked by the Forum Administrator."
Const strTxtRequiredFields = "Indicates required fields"

Const strTxtForumJump = "Forum Jump"
Const strTxtSelectForum = "Select Forum"


'Global Error
'---------------------------------------------------------------------------------
Const strTxtErrorDisplayLine = "_______________________________________________________________"
Const strTxtErrorDisplayLine1 = "The form has not been submitted because there are problem(s) with the form."
Const strTxtErrorDisplayLine2 = "Please correct the problem(s) and re-submit the form."
Const strTxtErrorDisplayLine3 = "The following field(s) need to be corrected: -"
Const strResetFormConfirm = "Are you sure you want to reset the form?"


'default.asp
'---------------------------------------------------------------------------------
Const strTxtCookies = "Cookies and JavaScript must be enabled on your web browser in order to use this forum"
Const strTxtForum = "Forum"
Const strTxtLatestForumPosts = "Latest Forum Posts"
Const strTxtForumStatistics = "Forum Statistics"
Const strTxtNoForumPostMade = "There have been no Forum Posts"
Const strTxtThereAre = "There are"
Const strTxtPostsIn = "Posts in"
Const strTxtTopicsIn = "Topics in"
Const strTxtLastPostOn = "Last Post on"
Const strTxtLastPostBy = "Last Post by"
Const strTxtForumMembers = "Forum Members"
Const strTxtTheNewestForumMember = "The Newest Forum Member is"


'display_forum_topics.asp
'---------------------------------------------------------------------------------
Const strTxtThreadStarter = "Topic Starter"
Const strTxtReplies = "Replies"
Const strTxtViews = "Views"
Const strTxtDeleteTopicAlert = "Are you sure you want to delete this topic?"
Const strTxtDeleteTopic = "Delete Topic"
Const strTxtNextTopic = "Next Topic"
Const strTxtLastTopic = "Last Topic"
Const strTxtShowTopics = "Show Topics"
Const strTxtNoTopicsToDisplay = "There are no message's posted in this forum in the last"

Const strTxtAll = "All"
Const strTxtLastWeek = "from the Last Week"
Const strTxtLastTwoWeeks = "from the Two Weeks"
Const strTxtLastMonth = "from the Last Month"
Const strTxtLastTwoMonths = "from the Last Two Months"
Const strTxtLastSixMonths = "from the Last Six Months"
Const strTxtLastYear = "from the Year"


'display_topic_threads.asp
'---------------------------------------------------------------------------------
Const strTxtMessageBy = "Message posted by"
Const strTxtLocation = "Location"
Const strTxtJoined = "Joined"
Const strTxtForumAdministrator = "Forum Administrator"
Const strTxtForumModerator = "Forum Moderator"
Const strTxtDeletePostAlert = "Are you sure you want to delete this post?"
Const strTxtEditPost = "Edit Post"
Const strTxtDeletePost = "Delete Post"
Const strTxtSearchForPosts = "Search for other posts by"
Const strTxtSubjectFolder = "Subject"
Const strTxtPrintVersion = "Printable version"
Const strTxtEmailTopic = "E-mail this topic"
Const strTxtSorryNoReply = "Sorry, you can NOT post a reply."
Const strTxtForumMembershipSespended = "Your Forum Membership is not active!"
Const strTxtThisForumIsLocked = "This forum has been locked by the forum administrator."
Const strTxtPostAReplyRegister = "If you wish to post a reply to this thread you must first"
Const strTxtNeedToRegister = "If you are not already registered you must first"
Const strTxtSmRegister = "register"
Const strTxtNoThreads = "There are no thread's in the database relating to this topic"
Const strTxtNotGiven = "Not Given"
Const strTxtNoMessageError = "Message \t- Enter a Message to post"


'search_form.asp
'---------------------------------------------------------------------------------
Const strTxtDiscussionForumSearch = "Discussion Forum Search"
Const strTxtSearchFormError = "Search For\t- Enter something to search for"


'search.asp
'---------------------------------------------------------------------------------
Const strTxtSearchResults = "Forum Search Results"
Const strTxtYourSearchHasFound = "Your search has found"
Const strTxtResults = "results"
Const strTxtNoSearchResults = "Sorry, your search found no results"
Const strTxtClickHereToRefineSearch = "Click here to refine your search"
Const strTxtSearchFor = "Search For"
Const strTxtSearchIn = "Search In"
Const strTxtSearchOn = "Search On"
Const strTxtAllWords = "All Words"
Const strTxtAnyWords = "Any Words"
Const strTxtPhrase = "Phrase"
Const strTxtTopicSubject = "Topic Subject"
Const strTxtMessageBody = "Message Body"
Const strTxtAuthor = "Author"
Const strTxtSearchForum = "Search Forum"
Const strTxtSortResultsBy = "Sort Results By"
Const strTxtLastPostTime = "Last Post Time"
Const strTxtTopicStartDate = "Topic Start Date"
Const strTxtSubjectAlphabetically = "Subject Alphabetically"
Const strTxtNumberViews = "Number of Views"
Const strTxtStartSearch = "Start Search"


'display_printer_threads.asp
'---------------------------------------------------------------------------------
Const strTxtPrintPage = "Print Page"
Const strTxtPrintedFrom = "Printed From"
Const strTxtForumName = "Forum Name"
Const strTxtForumDiscription = "Forum Discription"
Const strTxtURL = "URL"
Const strTxtPrintedDate = "Printed Date"
Const strTxtTopic = "Topic"
Const strTxtPostedBy = "Posted By"
Const strTxtDatePosted = "Date Posted"


'IE_textbox.asp
'---------------------------------------------------------------------------------
Const strTxtOriginallyPostedBy = "Originally posted by"


'emoticons.asp
'---------------------------------------------------------------------------------
Const strTxtEmoticonSmilies = "Emoticon Smilies"
Const strTxtClickOnEmoticonToAdd = "Click on the emoticon smiley you would like to add to your message."
Const strTxtSmile = "Smile"
Const strTxtEmbarassed = "Embarrassed"
Const strTxtWink = "Wink"
Const strTxtStar = "Star"
Const strTxtShocked = "Shocked"
Const strTxtDead = "Dead"
Const strTxtBigSmile = "Big smile"
Const strTxtSleepy = "Sleepy"
Const strTxtConfused = "Confused"
Const strTxtDisapprove = "Disapprove"
Const strTxtUnhappy = "Unhappy"
Const strTxtApprove = "Approve"
Const strTxtAngry = "Angry"
Const strTxtEvil = "Evil smile"
Const strTxtClown = "Clown"
Const strTxtCool = "Cool"


'login.asp
'---------------------------------------------------------------------------------
Const strTxtSorryUsernamePasswordIncorrect = "Sorry the Username or Password entered is incorrect."
Const strTxtPleaseTryAgain = "Please try again."
Const strTxtUsername = "Username"
Const strTxtPassword = "Password"
Const strTxtLoginUser = "Login User"
Const strTxtClickHereForgottenPass = "Click here if you have forgotten your password"

Const strTxtErrorUsername = "Username \t- Enter your Forum Username"
Const strTxtErrorPassword = "Password \t- Enter your Forum Password"


'forgotten_password.asp
'---------------------------------------------------------------------------------
Const strTxtForgottenPassword = "Forgotten Password"
Const strTxtNoRecordOfUsername = "Sorry, no record of the Username entered can not be found."
Const strTxtNoEmailAddressInProfile = "Sorry, your profile does not contain an e-mail address.<br>Your password can not be e-mailed to you."
Const strTxtReregisterForForum = "You will need to re register to use the forum."
Const strTxtPasswordEmailToYou = "Your password has been e-mailed to you."
Const strTxtPleaseEnterYourUsername = "Please enter your username in the box bellow.<br>Your password will then be sent to the e-mail address in your profile."
Const strTxtValidEmailRequired = "If your forum profile does not contain a valid e-mail address for you then you will have to re register to use the forum."
Const strTxtEmailPassword = "E-mail Password"

Const strTxtEmailPasswordRequest = "A request has been made for your password to be e-mailed to you for the Forum on"
Const strTxtEmailPasswordRequest2 = "Your password is: -"
Const strTxtEmailPasswordRequest3 = "To go to the forum now click on the link below: -"


'forum_password_form.asp
'---------------------------------------------------------------------------------
Const strTxtForumLogin = "Forum Login"
Const strTxtErrorEnterPassword = "Password \t- Enter a Password to use this Forum"
Const strTxtPasswordRequiredForForum = "This forum requires that you enter a password to proceed."
Const strTxtForumPasswordIncorrect = "Sorry the Password entered is incorrect."
Const strTxtAutoLogin = "Auto Login"
Const strTxtLoginToForum = "Login To Forum"


'profile.asp
'---------------------------------------------------------------------------------
Const strTxtNoUserProfileFound = "Sorry no profile can be found for this user"
Const strTxtRegisteredToViewProfile = "Sorry, you must be a registered user to view profiles."
Const strTxtMemberNo = "Member No."
Const strTxtEmail = "E-mail"
Const strTxtPrivate = "Private"


'post_message_form.asp
'---------------------------------------------------------------------------------
Const strTxtPostNewTopic = "Post New Topic"
Const strTxtErrorTopicSubject = "Subject \t- Enter a Subject for your new Topic"
Const strTxtForumMemberSuspended = "Sorry, this function is disabled as your Forum Membership is not activate!"


'edit_post.asp
'---------------------------------------------------------------------------------
Const strTxtNoPermissionToEditPost = "Sorry, you do not have permission to edit this post!"
Const strTxtReturnForumTopic = "Return to Forum Topic"


'e-mail_topic.asp
'---------------------------------------------------------------------------------
Const strTxtEmailTopicToFriend = "Email Topic To a Friend"
Const strTxtFriendSentEmail = "Your Friend has been sent the e-mail"
Const strTxtFriendsName = "Friends Name"
Const strTxtFriendsEmail = "Friends Email"
Const strTxtYourName = "Your Name"
Const strTxtYourEmail = "Your E-mail"
Const strTxtSendEmail = "Send E-mail"
Const strTxtMessage = "Message"

Const strTxtEmailFriendMessage = "I thought you might be interested in a post on the "
Const strTxtEmailRecievedFrom = "You have received this e-mail from: -"

Const strTxtErrorFrinedsName = "Friends Name \t- Enter your Friends Name"
Const strTxtErrorFriendsEmail = "Friends E-mail \t- Enter a valid e-mail address for your friend"
Const strTxtErrorYourName = "Your Name \t- Enter your Name"
Const strTxtErrorYourEmail = "Your E-mail \t- Enter your valid e-mail address"
Const strTxtErrorEmailMessage = "Message \t- Enter a message for your friend"


'forum_members.asp
'---------------------------------------------------------------------------------
Const strTxtForumMembersList = "Forum Members List"
Const strTxtMemberSearch = "Member Search"
Const strTxtForumMembersOn = "forum members on"
Const strTxtPageYouAerOnPage = "pages and you are on page number"
Const strTxtYourSearchMembersFound = "Your search of the forum members found"
Const strTxtMatches = "matches"

Const strTxtUsernameAlphabetically = "Username Alphabetically"
Const strTxtNewForumMembersFirst = "New Forum Members First"
Const strTxtOldForumMembersFirst = "Old Forum Members First"
Const strTxtLocationAlphabetically = "Location Alphabetically"

Const strTxtRegistered = "Registered"
Const strTxtSend = "Send"
Const strTxtPrivateEmail = "a private e-mail"
Const strTxtNext = "Next"
Const strTxtPrevious = "Prev"
Const strTxtPage = "Page" 

Const strTxtErrorMemberSerach = "Member Search\t- Enter a Members Username to search for"


'message_form.inc
'---------------------------------------------------------------------------------
Const strTxtTextFormat = "Text Format"
Const strTxtPreviewPost = "Preview Post"
Const strTxtMode = "Mode"
Const strTxtPrompt = "Prompt"
Const strTxtBasic = "Basic"
Const strTxtAddEmailLink = "Add E-mail Link"
Const strTxtList = "List"
Const strTxtCentre = "Centre"

Const strTxtEnterBoldText = "Enter text you want formatted in Bold"
Const strTxtEnterItalicText = "Enter text you want formatted in Italic"
Const strTxtEnterUnderlineText = "Enter text you want Underlined"
Const strTxtEnterCentredText = "Enter text you want Centred"
Const strTxtEnterHyperlinkText = "Enter the on screen display text for the Hyperlink"
Const strTxtEnterHeperlinkURL = "Enter the URL address to create Hyperlink to"
Const strTxtEnterEmailText = "Enter the on screen display text for the e-mail address"
Const strTxtEnterEmailMailto = "Enter the e-mail address to link to"
Const strTxtEnterImageURL = "Enter the web address of the image"
Const strTxtEnterTypeOfList = "Type of list"
Const strTxtEnterEnter = "Enter"
Const strTxtEnterNumOrBlankList = "for numbered or leave blank for bulleted"
Const strTxtEnterListError = "ERROR! Please enter"
Const strEnterLeaveBlankForEndList = "List item Leave blank to end list"


'IE_message_form.inc
'---------------------------------------------------------------------------------
Const strTxtCut = "Cut"
Const strTxtCopy = "Copy"
Const strTxtPaste = "Paste"
Const strTxtBold = "Bold"
Const strTxtItalic = "Italic"
Const strTxtUnderline = "Underline"
Const strTxtLeftJustify = "Left Justify"
Const strTxtCentrejustify = "Centre Justify"
Const strTxtRightJustify = "Right Justify"
Const strTxtUnorderedList = "Unordered List"
Const strTxtOutdent = "Outdent"
Const strTxtIndent = "Indent"
Const strTxtAddHyperlink = "Add Hyperlink"
Const strTxtAddImage = "Add Image"
Const strTxtJavaScriptEnabled = "JavaScript must be enabled on your web browser for you to post a message in the forum!"
Const strTxtShowSignature = "Show Signature"
Const strTxtEmailNotify = "E-mail Notify me of Replies"
Const strTxtUpdatePost = "Update Post"
Const strTxtSpecialCharacters = "Special Characters"
Const strTxtFontColour = "Colour"


'register_form.inc
'---------------------------------------------------------------------------------
Const strTxtRegisterNewUser = "Register New User"

Const strTxtProfileUsernameLong = "This is the name displayed when you use the forum"
Const strTxtRetypePassword = "Retype Password"
Const strTxtProfileEmailLong = "Not required, but useful if you wish to be notified when someone answers one of your post's or if you lose your password"
Const strTxtShowHideEmail = "Show or hide e-mail"
Const strTxtShowHideEmailLong = "Hide your e-mail address if you want it kept private from other users"
Const strTxtShowEmail = "Show E-mail"
Const strTxtHideEmail = "Hide E-mail"
Const strTxtSelectCountry = "Select Country"
Const strTxtProfileAutoLogin = "Automatically log me in when I return to the Forum"
Const strTxtSignature = "Signature"
Const strTxtSignatureLong = "Enter a signature that you would like shown at the bottom of your Forum Posts"

Const strTxtErrorUsernameChar = "Username \t- Your Username must be at least 4 characters"
Const strTxtErrorPasswordChar = "Password \t- Your Password must be at least 4 characters"
Const strTxtErrorPasswordNoMatch = "Password Error\t- The passwords entered do not match"
Const strTxtErrorValidEmail = "E-mail\t\t- Enter your valid e-mail address"
Const strTxtErrorValidEmailLong = "If you don't want to enter your e-mail address then leave the e-mail field blank"
Const strTxtErrorNoEmailToShow = "You can not show your e-mail address if you haven\'t entered one!"
Const strTxtErrorSignatureToLong = "Signature \t- Your signature has to many characters"

'profile_edit.inc
'---------------------------------------------------------------------------------
Const strTxtUpdateProfile = "Update Profile"


'register_new_user.inc
'---------------------------------------------------------------------------------
Const strTxtUsrenameGone = "Sorry the Username you requested is already taken.<br>Please choose another Username."
Const strTxtEmailThankYouForRegistering = "Thank-you for taking the time to register to use the"
Const strTxtEmailYouCanNowUseTheForumAt = "Your login details can be found below and now you have registered for a new account you can post new messages and reply to existing ones on the"
Const strTxtEmailForumAt = "Forum at"
Const strTxtEmailToThe = "to the"


'register_new_user.inc
'---------------------------------------------------------------------------------
Const strTxtEmailAMeesageHasBeenPosted = "A message has been posted in the forum on"
Const strTxtEmailClickOnLinkBelowToView = "To view the post then click on the link below"
Const strTxtEmailAMeesageHasBeenPostedOnForumNum = "A message has been posted in the forum number"


'registration_rules.asp
'---------------------------------------------------------------------------------
Const strTxtForumRulesAndPolicies = "Forum Rules and Policies"
Const srtTxtAccept = "Accept"
Const strTxtCancel = "Cancel"




'New from version 6
'---------------------------------------------------------------------------------
Const strTxtHi = "Hi"
Const strTxtForumPostNotifi = "Forum Post Notification"
Const strTxtInterestingForumPostOn = "Interesting Forum post on"
Const strTxtForumLostPasswordRequest = "Forum Lost Password Request"
Const strTxtLockTopic = "Lock Closed"
Const strTxtLockForum = "Lock Forum"
Const strTxtLockTopicAlert = "Are you sure you want to Lock this Topic?"
Const strTxtUnLockTopicAlert = "Are you sure you want to Un-Lock this Topic?"
Const strTxtLockForumAlert = "Are you sure you want to Lock this Forum?"
Const strTxtUnLockForumAlert = "Are you sure you want to Un-Lock this Forum?"
Const strTxtLockedTopic = "Closed Topic"
Const strTxtUnLockTopic = "Un-Lock Topic"
Const strTxtTopicLocked = "Topic Closed"
Const strTxtUnForumLocked = "Un-Lock Forum"
Const strTxtThisTopicIsLocked = "This topic is closed."
Const strTxtThatYouAskedKeepAnEyeOn = "that you asked us to keep an eye on."
Const strTxtTheTopicIsNowDeleted = "The Topic has now been Deleted."
Const strTxtOf = "of"
Const strTxtDeleteMember = "Delete Member"
Const strTxtTheTimeNowIs = "The time now is"
Const strTxtYouLastVisitedOn = "You last visited on"
Const strTxtSendMsg = "Send PM"
Const strTxtSendPrivateMessage = "Send Private Message"
Const strTxtDeleteMemberCheck = "Are you sure you want to permanently Delete this Member from the Forum?"
Const strTxtActiveUsers = "Active Users"
Const strTxtGuestsAnd = "Guest(s) and"
Const strTxtMembers = "Member(s)"
Const strTxtPreview = "Preview"
Const strTxtRemoveAvatar = "Remove Avatar"
Const strTxtRemoveSignature = "Remove Signature"
Const strTxtThereIsNothingToPreview = "There is nothing to preview"
Const strTxtEnterTextYouWouldLikeIn = "Enter the text that you would like in"
Const strTxtEmailAddressAlreadyUsed = "Sorry, the e-mail address entered has already been used to register a member."
Const strTxtIP = "IP"
Const strTxtIPLogged = "IP Logged"
Const strTxtPages = "Pages"
Const strTxtCharacterCount = "Character Count"
Const strTxtAdmin = "Admin"


Const strTxtType = "Group"
Const strTxtActive = "Active"
Const strNotActive = "Not Active"
Const strTxtSuspended = "Suspended"
Const strTxtMembership = "Membership"
Const strTxtUpdateAccount = "Update Profile"
Const strTxtGuest = "Guest"
Const strTxtStandardMember = "Standard Member"
Const strTxtGoldMember = "Gold Member"
Const strTxtPlatinumMember = "Platinum Member"

Const strTxtEmailRequiredForActvation = "Required to be able to receive an e-mail to activate your membership"
Const strTxtToActivateYourMembershipFor = "To activate your membership for"
Const strTxtForumClickOnTheLinkBelow = "Forum click on the link below"
Const strTxtForumAdmin = "Forum Admin"
Const strTxtViewLastPost = "View Last Post"
Const strTxtSelectAvatar = "Select Avatar"
Const strTxtAvatar = "Avatar"
Const strTxtSelectAvatarDetails = "This is the small icon shown next to your posts. Either select one from the list or type the path in to your own Avatar (must be 32 x 32 pixels)."
Const strTxtForumCodesInSignature = "can be used in your signature"

Const strTxtHighPriorityPost = "Priority Topic"
Const strTxtHighPriorityPostLocked = "Locked Priority Topic"
Const strTxtHotTopicNewReplies = "Hot Topic (new replies)"
Const strTxtHotTopic = "Hot Topic (no new replies)"
Const strTxtOpenTopic = "Open Topic (no new replies)"
Const strTxtOpenTopicNewReplies = "Open Topic (new replies)"
Const strTxtPinnedTopic = "Pinned Topic"

Const strTxtOpenForum = "Open Forum (no new replies)"
Const strTxtOpenForumNewReplies = "Open Forum (new replies)"
Const strTxtReadOnly = "Read Only (no new replies)"
Const strTxtReadOnlyNewReplies = "Read Only (new replies)"
Const strTxtPasswordRequired = "Password Required"
Const strTxtNoAccess = "No Access"

Const strTxtFont = "Font"
Const strTxtSize = "Size"
Const strTxtForumCodes = "Forum Codes"

Const strTxtPriority = "Priority"
Const strTxtNormal = "Normal"
Const strTxtTopAllForums = "Top (all forums)"
Const strTopThisForum = "Top (this forum)"
Const strTopPinned = "Pinned"


Const strTxtMarkAllPostsAsRead = "Mark all posts as read"
Const strTxtDeleteCookiesSetByThisForum = "Delete cookies set by this forum"


'forum_codes
'---------------------------------------------------------------------------------
Const strTxtYouCanUseForumCodesToFormatText = "You can use the following Forum Codes to Format your text"
Const strTxtTypedForumCode = "Typed Forum Code"
Const strTxtConvetedCode = "Converted Code"
Const strTxtTextFormating = "Text Formatting"
Const strTxtImagesAndLinks = "Images and Links"
Const strTxtFontTypes = "Font Types"
Const strTxtFontSizes ="Font Sizes"
Const strTxtFontColours ="Font Colours"
Const strTxtEmoticons = "Emoticons"
Const strTxtFontSize = "Font Size"
Const strTxtMyLink = "My Link"
Const strTxtMyEmail = "My E-mail"

'pm_welcome.asp
'---------------------------------------------------------------------------------
Const strTxtToYourPrivateMessenger = "to your Private Messenger"
Const strTxtPmIntroduction = "From your Private Messenger you can send and receive Private Messages between yourself and other forum members, knowing that your messages won't be viewed by other forum members."
Const strTxtInboxStatus = "Inbox Status"
Const strTxtYouHave = "You have"
Const strTxtNewMsgsInYourInbox = "new message(s) in your inbox!"
Const strTxtGoToYourInbox = "Go to your inbox"
Const strTxtNoNewMsgsInYourInbox = "You have no new messages in your inbox."
Const strTxtYourLatestPrivateMessageIsFrom = "Your latest Private Message is from"
Const strTxtSentOn = "sent on"
Const strTxtPrivateMessengerOverview = "Private Messenger Overview"
Const strTxtInboxOverview = "This is where all incoming Private Messages are stored and from where you can view or delete any Private Messages you have received. It works very much like your e-mail 'inbox'."
Const strTxtBuddyListOverview = "This is like an address book. You can add or delete forum members to your Buddy List for quick reference. You can also block those members you don't wish to receive Private Messages from."
Const strTxtNewMsgOverview = "This is where you can compose new Private Messages and send them to other forum members."

'pm_inbox.asp
'---------------------------------------------------------------------------------
Const strTxtPrivateMessenger = "Private Messenger"
Const strTxtInbox = "Inbox"
Const strTxtBuddyList = "Buddy List"
Const strTxtNewPrivateMessage = "New Private Message"
Const strTxtNoPrivateMessages = "You have no Private Messages in your Inbox"
Const strTxtRead = "Read"
Const strTxtMessageTitle = "Message Title"
Const strTxtMessageFrom = "Message From"
Const strTxtDate = "Date"
Const strTxtAddBuddy = "Add Buddy"
Const strTxtBlock = "block"
Const strTxtUnreadMessage = "Unread message"
Const strTxtReadMessage = "Read message"
Const strTxtSentBy = "Sent by"
Const strTxtDeletePrivateMessageAlert = "Are you sure you want to delete the selected Private Message(s)?"
Const strTxtPrivateMessagesYouCanReceiveAnother = "Private Messages, you can receive another"
Const strTxtOutOf = "out of"
Const strTxtNew = "new"

'pm_show_message.asp
'---------------------------------------------------------------------------------
Const strTxtSorryYouDontHavePermissionsPM = "Sorry, you don't have permission to view this private message"
Const strTxtYouDoNotHavePermissionViewPM = "You do not have permission to view this Private Message."
Const strTxtNotificationReadPM = "Read Private Message Notification"
Const strTxtReplyToPrivateMessage = "Reply To Private Message"
Const strTxtAddToBuddy = "Add To Buddy List"

'pm_new_message_form.asp
'---------------------------------------------------------------------------------
Const strTxtSendNewMessage = "Send New Message"
Const strTxtNoneSelected = "None Selected"
Const strTxtPostMessage = "Post Message"
Const strTxtEmailNotifyWhenPMIsRead = "E-mail Notify me when message is read"
Const strTxtToUsername = "To Username"
Const strSelectFormBuddyList = "or select from Buddy List"
Const strTxtNoPMSubjectErrorMsg = "Subject \t\t- Enter a Subject for your new Private Message"
Const strTxtNoToUsernameErrorMsg = "To Username \t- Enter or Select a Username to send you Private Message to"
Const strTxtNoPMErrorMsg = "Message \t\t- Enter a Private Message to send"
Const strTxtPreviousPrivateMessage = "Previous Private Message"
Const strTxtSent = "Sent"

'pm_post_message.asp
'---------------------------------------------------------------------------------
Const strTxtAPrivateMessageHasBeenPosted = "A Private Message has been posted for you on"
Const strTxtClickOnLinkBelowForPM = "Click on the link below to go to the forum to view the Private Message"
Const strTxtNotificationPM = "Private Message Notification"
Const strTxtTheUsernameCannotBeFound = "The Username you have entered can not be found."
Const strTxtYourPrivateMessage = "Your Private Message"
Const strTxtHasNotBeenSent = "has not been sent!"
Const strTxtAmendYourPrivateMessage = "Amend your Private Message"
Const strTxtReturnToYourPrivateMessenger = "Return to your Private Messenger"
Const strTxtYouAreBlockedFromSendingPMsTo = "You are blocked you from sending Private Messages to"
Const strTxtHasExceededMaxNumPPMs = "has exceeded the maximum number of Private Messages they are allowed to receive"

'pm_buddy_list.asp
'---------------------------------------------------------------------------------
Const strTxtNoBuddysInList = "You have no Buddy's in your Buddy List"
Const strTxtDeleteBuddyAlert = "Are you sure you want to Delete this Buddy from your Buddy List?"
Const strTxtNoBuddyErrorMsg = "Member Name \t- Enter a Forum Member to add to your Buddy List"
Const strTxtBuddy = "Buddy"
Const strTxtDescription = "Description"
Const strTxtContactStatus = "Contact Status"
Const strTxtThisPersonCanNotMessageYou = "This person can not message you"
Const strTxtThisPersonCanMessageYou = "This person can message you"
Const strTxtAddNewBuddyToList = "Add New Buddy to List"
Const strTxtMemberName = "Member Name"
Const strTxtAllowThisMemberTo = "Allow this member to"
Const strTxtMessageMe = "Message me"
Const strTxtNotMessageMe = "Not message me"
Const strTxtHasNowBeenAddedToYourBuddyList = "has now been added to your Buddy List"
Const strTxtIsAlreadyInYourBuddyList = "is already in your Buddy List"
Const strTxtUserCanNotBeFoundInDatabase = "can not be found in the database.\n\nCheck you havn\'t misspelled the Members Username"


'insufficient_permission.asp
'---------------------------------------------------------------------------------
Const strTxtAccessDenied = "Access Denied"
Const strTxtInsufficientPermison = "Sorry, only members with sufficient permission can access this page."


'activate.asp
'---------------------------------------------------------------------------------
Dim strTxtYourForumMemIsNowActive
strTxtYourForumMemIsNowActive = "Thank-you for registering.<br><br>Your " & strWebsiteName & " Forum membership is now active."
Dim strTxtErrorWithActvation
strTxtErrorWithActvation = "There is a problem activating your membership.<br><br>Please contact the " & strWebsiteName & " <a href=""mailto:" & strForumEmailAddress & """>Forum Administrator</a>."


'register_mail_confirm.asp
'---------------------------------------------------------------------------------
Const strTxtYouShouldReceiveAnEmail = "You should receive an e-mail in the next 15 minutes.<br>Click on the link in this e-mail to activate your Forum Membership."
Dim strTxtThankYouForRegistering
strTxtThankYouForRegistering = "Thank-you for registering to use the " & strWebsiteName & " Forum."
Dim strTxtIfErrorActvatingMembership
strTxtIfErrorActvatingMembership = "If you have a problem activating your membership please contact the " & strWebsiteName & " <a href=""mailto:" & strForumEmailAddress & """>Forum Administrator</a>." 


'move_topic_form.asp
'---------------------------------------------------------------------------------
Const strTxtMoveTopic = "Move Topic"
Const strTxtSelectTheForumYouWouldLikeForumIn = "Select the Forum you would like this topic to be in"
Const strTxtMoveTopicErrorMsg = "Forum\t- Please select a Forum to move the Topic to"


'active_users.asp
'---------------------------------------------------------------------------------
Const strTxtActiveForumUsers = "Active Forum Users"
Const strTxtAddMToActiveUsersList = "Add me to Active Users list"
Const strTxtLoggedIn = "Logged In"
Const strTxtLastActive = "Last Active"
Const strTxtBrowser = "Browser"
Const strTxtOS = "OS"
Const strTxtMinutes = "minutes"
Const strTxtAnnoymous = "Anonymous"



'not_posted.asp
'---------------------------------------------------------------------------------
Const strTxtMessageNotPosted = "Message Not Posted"
Const strTxtDoublePostingIsNotPermitted = "Double posting is not permitted; your message has been posted already."
Const strTxtSpammingIsNotPermitted = "Spamming is not permitted!"
Const strTxtYouHaveExceededNumOfPostAllowed = "You have exceeded the number of posts permitted in the time span.<br><br>Please try again later."
Const strTxtYourMessageNoValidSubjectHeading = "Your message did not contain a valid subject heading and/or message body."


'active_topics.asp
'---------------------------------------------------------------------------------
Const strTxtActiveTopics = "Active Topics"
Const strTxtLastVisitOn = "Last visit on"
Const strTxtLastFifteenMinutes = "Last 15 minutes"
Const strTxtLastThirtyMinutes = "Last 30 minutes"
Const strTxtLastFortyFiveMinutes = "Last 45 minutes"
Const strTxtLastHour = "Last hour"
Const strTxtLastTwoHours = "Last 2 hours"
Const strTxtYesterday = "Yesterday"
Const strTxtShowActiveTopicsSince = "Show Active Topics since"
Const strTxtNoActiveTopicsSince = "There are no Active Topics since"
Const strTxtToDisplay = "to display"
Const strTxtThereAreCurrently = "There are currently"



'pm_check.inc
'---------------------------------------------------------------------------------
Const strTxtNewPMsClickToGoNowToPM = "new Private Message(s).\n\nClick OK to go to go to your Private Messenger."


'display_forum_topics.inc
'---------------------------------------------------------------------------------
Const strTxtFewYears = "few years"
Const strTxtWeek = "week"
Const strTxtTwoWeeks = "two weeks"
Const strTxtMonth = "month"
Const strTxtTwoMonths = "two months"
Const strTxtSixMonths = "6 months"
Const strTxtYear = "year"

'Colours
'---------------------------------------------------------------------------------
Const strTxtBlack = "Black"
Const strTxtWhite = "White"
Const strTxtBlue = "Blue"
Const strTxtRed = "Red"
Const strTxtGreen = "Green"
Const strTxtYellow = "Yellow"
Const strTxtOrange = "Orange"
Const strTxtBrown = "Brown"
Const strTxtMagenta = "Magenta"
Const strTxtCyan = "Cyan"
Const strTxtLimeGreen = "Lime Green"



'New from version 6.10
'---------------------------------------------------------------------------------
Const strTxtHasBeenSentTo = "has been sent to"
Const strTxtCharactersInYourSignatureToLong = "characters in your signature, you must shorten it to below 200"
Const strTxtThisIsToNotifyYouThat = "This is to notify you that"
Const strTxtHasReadPMYouSentThem = "has read the Private Message you sent to them on"


'New from version 6.12
'---------------------------------------------------------------------------------
Const strTxtSorryYourSearchFoundNoMembers = "Sorry, your search found no forum members that match your criteria"


'New from version 6.20
'---------------------------------------------------------------------------------
Const strTxtCahngeOfEmailReactivateAccount = "If you change your e-mail address you will be sent an e-mail to re-activate your account"
Const strTxtAddToBuddyList = "Add to Buddy List"


'register_mail_confirm.asp
'---------------------------------------------------------------------------------
Const strTxtYourEmailAddressHasBeenChanged = "Your e-mail address has been changed, <br>you will have to re-activate your forum membership before you can use the forum again."
Const strTxtYouShouldReceiveAReactivateEmail = "You should receive an e-mail in the next 15 minutes.<br>Click on the link in this e-mail to re-activate your Forum Membership."


'move_post_form.asp
'---------------------------------------------------------------------------------
Const strTxtMovePost = "Move Post"
Const strTxtSelectTheForumYouWouldLikePostIn = "Select the Forum you would like this post to be in"
Const strTxtMovePostErrorMsg = "Forum\t- Please select a Forum to move the Post to"
Const strTxtSelectForumClickNext = "Step 1: - Select the Forum you would like to move the Post to.<br>Then click on the Next button."
Const strTxtSelectTopicToMovePostTo = "Step 2: - Select the Topic to move the Post to from the last 400 Topics in this<br>forum. Alternatively type the name of a new Topic in the box at the<br>bottom to place the Post in a new Topic."
Const strTxtSelectTheTopicYouWouldLikeThisPostToBeIn = "Select the Topic you would like this post to be in"
Const strTxtOrTypeTheSubjectOfANewTopic = "Or, type the Subject of a new Topic"


'New from version 6.27

'Preview signature windos
'---------------------------------------------------------------------------------
Const strTxtSignaturePreview = "Signature Preview"
Const strTxtPostedMessage = "Posted Message"
%>